<?php
declare(strict_types=1);

namespace AssetMix\Utility;

use Exception;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class that handles manipulation of files and directories
 */
class FileUtility implements FileUtilityInterface
{
    /**
     * @inheritDoc
     */
    public function copy(string $from, string $to): bool
    {
        if (copy($from, $to)) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function recursiveCopy(string $source, string $destination): void
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        /** @var \SplFileInfo $item */
        foreach ($iterator as $item) {
            if ($item->isDir()) {
                $this->mkdir($destination . DS . $iterator->getSubPathName());
            } else {
                $this->copy(
                    $item->getPath() . DS . $item->getFilename(),
                    $destination . DS . $iterator->getSubPathName()
                );
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * @inheritDoc
     */
    public function mkdir(string $path, array $options = []): bool
    {
        if ($this->exists($path)) {
            return false;
        }

        return mkdir($path, 0755);
    }

    /**
     * @inheritDoc
     */
    public function delete(string|array $paths): void
    {
        if (! is_array($paths)) {
            $paths = [$paths];
        }

        foreach ($paths as $path) {
            if (! $this->exists($path)) {
                continue;
            }

            if (is_dir($path)) {
                $this->deleteDir($path);
            } else {
                unlink($path);
            }
        }
    }

    /**
     * Force delete non-empty directory.
     *
     * @param string $path Path of the directory to remove.
     * @return void
     */
    private function deleteDir(string $path): void
    {
        $it = new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator(
            $it,
            RecursiveIteratorIterator::CHILD_FIRST
        );
        /** @var \SplFileInfo $file */
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }

        rmdir($path);
    }

    /**
     * @inheritDoc
     */
    public function write(string $filename, string $content): bool
    {
        if (! file_exists($filename)) {
            touch($filename);
        }

        if (! is_writable($filename)) {
            throw new Exception('File is not writable, please fix permission');
        }

        $file = fopen($filename, 'w');
        if (! $file) {
            throw new Exception('Unable to open file');
        }

        if (! fwrite($file, $content)) {
            throw new Exception('Unable to open file');
        }

        fclose($file);

        return true;
    }
}
