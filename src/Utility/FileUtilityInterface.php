<?php
declare(strict_types=1);

namespace AssetMix\Utility;

/**
 * Contract for fily utility class
 */
interface FileUtilityInterface
{
    /**
     * Copy files or directories to new location
     *
     * @param string $from Path of a file/directory
     * @param string $to Path of new location
     * @return bool
     */
    public function copy(string $from, string $to): bool;

    /**
     * Copy files and directories recursively.
     *
     * @param string $source Source path to copy from.
     * @param string $destination Destination path to copy to.
     * @return void
     */
    public function recursiveCopy(string $source, string $destination): void;

    /**
     * Checks if give file or directory exists
     *
     * @param string $path Location of a file/directory
     * @return bool
     */
    public function exists(string $path): bool;

    /**
     * Create new directory
     *
     * @param string $path Location of a directory
     * @param array<string> $options Configuration options
     * @return bool
     */
    public function mkdir(string $path, array $options = []): bool;

    /**
     * Remove(delete) files or directories
     *
     * @param array<string>|string $paths Path of a file/directory to delete
     * @return void
     */
    public function delete(string|array $paths): void;

    /**
     * Writes into a file with give contents.
     * Creates file if not exist.
     *
     * @param string $filename File name with absolute path.
     * @param string $content Content to write into the file.
     * @return bool Returns true on success, false otherwise.
     * @throws \Exception In case of failure.
     */
    public function write(string $filename, string $content): bool;
}
