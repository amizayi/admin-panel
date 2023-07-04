<?php

if (!function_exists('getDirNameFromPath')) {
    /**
     * Extract the directory name from a given file path.
     *
     * @param string $path
     * @return string
     */
    function getDirNameFromPath(string $path): string
    {
        $parts = pathinfo($path);
        return $parts['dirname'];
    }
}

if (!function_exists('getFileNameFromPath')) {
    /**
     * Extract the directory name from a given file path.
     *
     * @param string $path
     * @return string
     */
    function getFileNameFromPath(string $path): string
    {
        $parts = pathinfo($path);
        return $parts['basename'];
    }
}

if (!function_exists('getFullPathFromFileName')) {
    /**
     * Get full path from a given file name.
     *
     * @param string $fileName
     * @return string
     */
    function getFullPathFromFileName(string $fileName): string
    {
        return convertToFormattedPath($fileName) . $fileName;
    }
}

if (!function_exists('getGenerateNameFromPath')) {
    /**
     * Extract the generate name from a given file path.
     *
     * @param string $path
     * @return string
     */
    function getGenerateNameFromPath(string $path): string
    {
        $parts = pathinfo($path);
        return $parts['filename'];
    }
}

if (!function_exists('convertToFormattedPath')) {
    /**
     * Convert file name to a formatted path.
     *
     * @param string $fileName
     * @return string
     */
    function convertToFormattedPath(string $fileName): string
    {
        $year  = substr($fileName, 0, 4);
        $month = substr($fileName, 4, 2);
        $day   = substr($fileName, 6, 2);
        $hour  = substr($fileName, 8, 2);

        return sprintf('%s/%s/%s/%s/', $year, $month, $day, $hour);
    }
}
