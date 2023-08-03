<?php

use Modules\LogActivity\Contracts\V1\Repositories\LogActivityRepository;

if (!function_exists('logActivity')) {
    /**
     * Get the Log Activity repo.
     *
     * @return LogActivityRepository
     */
    function logActivity(): LogActivityRepository
    {
        return resolve(LogActivityRepository::class);
    }
}
