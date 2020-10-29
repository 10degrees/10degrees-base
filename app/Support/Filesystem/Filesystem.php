<?php

namespace App\Support\Filesystem;

class Filesystem
{
    /**
     * Put the contents to a file
     *
     * @param string $path
     * @param mixed  $data
     *
     * @return int|false
     */
    public function put(string $path, $data)
    {
        return file_put_contents($path, $data);
    }

    /**
     * Get the file contents
     *
     * @param string $path
     *
     * @return string
     */
    public function get(string $path): string
    {
        return file_get_contents($path);
    }

    /**
     * Determine if a file exists
     *
     * @param string $path
     *
     * @return boolean
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * Determine if path is a directory
     *
     * @param string $path
     *
     * @return boolean
     */
    public function isDirectory(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * Create a directory.
     *
     * @param string $path
     * @param int    $mode
     * @param bool   $recursive
     * @param bool   $force
     *
     * @return bool
     */
    public function makeDirectory(string $path, $mode = 0755, $recursive = false, $force = false): bool
    {
        if ($force) {
            return @mkdir($path, $mode, $recursive);
        }

        return mkdir($path, $mode, $recursive);
    }
}
