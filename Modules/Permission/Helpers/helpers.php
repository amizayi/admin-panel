<?php

use Modules\Permission\Repositories\Contracts\PermissionRepository;
use Modules\Permission\Repositories\Contracts\RoleRepository;

if (!function_exists('permission')) {
    /**
     * Get the Permission repo.
     *
     * @return PermissionRepository
     */
    function permission(): PermissionRepository
    {
        return resolve(PermissionRepository::class);
    }
}

if (!function_exists('role')) {
    /**
     * Get the Role repo.
     *
     * @return RoleRepository
     */
    function role(): RoleRepository
    {
        return resolve(RoleRepository::class);
    }
}
