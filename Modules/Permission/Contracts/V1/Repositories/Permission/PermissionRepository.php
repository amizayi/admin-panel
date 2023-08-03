<?php

namespace Modules\Permission\Contracts\V1\Repositories\Permission;

use Prettus\Repository\Contracts\RepositoryInterface;

interface PermissionRepository extends RepositoryInterface
{
    /**
     * Delete a permission and all its children.
     *
     * @param int $id The ID of the permission to delete.
     * @return  mixed deleted permission object.
     */
    public function deletePermissionAndChildren(int $id): mixed;
}
