<?php

namespace Modules\Permission\Repositories\Contracts;


use Prettus\Repository\Contracts\RepositoryInterface;

interface RoleRepository extends RepositoryInterface
{
    /**
     * Delete a role and all its children including their permissions.
     *
     * @param int $id The ID of the role to delete.
     * @return  mixed deleted role object.
     */
    public function deleteRoleAndChildren(int $id): mixed;

}
