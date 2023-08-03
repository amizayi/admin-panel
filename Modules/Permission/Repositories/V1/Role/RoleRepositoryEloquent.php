<?php

namespace Modules\Permission\Repositories\V1\Role;

use Modules\Permission\Contracts\V1\Repositories\Role\RoleRepository;
use Modules\Permission\Entities\V1\Role\Role;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Delete a role and all its children including their permissions.
     *
     * @param int $id The ID of the role to delete.
     * @return Role The deleted role object.
     */
    public function deleteRoleAndChildren(int $id): mixed
    {
        $role = $this->find($id);
        $role->permissions()->delete();

        $role->children->map(function ($child) {
            $child->permissions()->delete();
            $child->delete();
        });

        $role->delete();
        return $role;
    }


}
