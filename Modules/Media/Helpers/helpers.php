<?php

if (!function_exists('getDirNameFromPath')) {
    /**
     * Extract the directory name from a given file name.
     *
     * @param string $fileName
     * @return string
     */
    function getDirNameFromPath(string $fileName): string
    {
        $parts = pathinfo($fileName);
        return $parts['dirname'];
    }
}

if (!function_exists('getFileNameFromPath')) {
    /**
     * Extract the directory name from a given file name.
     *
     * @param string $fileName
     * @return string
     */
    function getFileNameFromPath(string $fileName): string
    {
        $parts = pathinfo($fileName);
        return $parts['filename'];
    }
}
