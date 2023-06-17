<?php

use Modules\Permission\Repositories\Contracts\PermissionRepository;

if (!function_exists('permission')) {
    /**
     * Get the user repo.
     *
     * @return PermissionRepository
     */
    function permission(): PermissionRepository
    {
        return resolve(PermissionRepository::class);
    }
}
