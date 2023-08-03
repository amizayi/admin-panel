<?php

use Modules\Permission\Contracts\V1\Repositories\Permission\PermissionRepository;
use Modules\Permission\Contracts\V1\Repositories\Role\RoleRepository;

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
