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
