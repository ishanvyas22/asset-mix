<?php
namespace AssetMix\Utility;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
 * Class that handles manipulation of files and directories
 */
class FileUtility implements FileUtilityInterface
{
    /**
     * Filesystem object
     *
     * @var null|Filesystem
     */
    private $filesystem = null;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->filesystem = new Filesystem(new Local(ROOT));
    }

    /**
     * {@inheritDoc}
     */
    public function copy($from, $to)
    {
        return $this->filesystem->copy($from, $to);
    }

    /**
     * {@inheritDoc}
     */
    public function recursiveCopy($source, $destination)
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                mkdir($destination . DS . $iterator->getSubPathName());
            } else {
                copy($item, $destination . DS . $iterator->getSubPathName());
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function exists($path)
    {
        return $this->filesystem->has($path);
    }

    /**
     * {@inheritDoc}
     */
    public function mkdir($path, $options = [])
    {
        return $this->filesystem->createDir($path);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($paths)
    {
        if (!is_array($paths)) {
            $paths = [$paths];
        }

        foreach ($paths as $path) {
            if (! $this->exists($path)) {
                continue;
            }

            if (! $this->filesystem->delete($path)) {
                // Use `deleteDir()` if `delete()` doesn't work
                $this->filesystem->deleteDir($path);
            }
        }
    }
}
