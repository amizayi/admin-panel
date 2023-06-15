<?php

if (!function_exists('formatPaginationDetails')) {
    /**
     * Format the pagination details into an array.
     *
     * @param mixed $paginationData
     * @return array
     */
    function formatPaginationDetails(mixed $paginationData): array
    {
        return [
            'total'          => $paginationData->total(),
            'from'           => $paginationData->firstItem(),
            'to'             => $paginationData->lastItem(),
            'per_page'       => $paginationData->perPage(),
            'current_page'   => $paginationData->currentPage(),
            'last_page'      => $paginationData->lastPage(),
            'first_page_url' => $paginationData->url(1),
            'prev_page_url'  => $paginationData->previousPageUrl(),
            'next_page_url'  => $paginationData->nextPageUrl(),
            'last_page_url'  => $paginationData->url($paginationData->lastPage()),
            'default_path'   => $paginationData->path(),
        ];
    }

}

if (!function_exists('__response')) {
    /**
     * Get Lang Response.
     *
     * @param string $name
     * @param string $type
     * @param string $key
     * @return string
     */
    function __response(string $name = "", string $type = "base", string $key = "success"): string
    {
        return __("api::response.$key.$type", ['name' => $name]);
    }
}
