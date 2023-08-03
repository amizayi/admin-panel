<?php

namespace Modules\Permission\Repositories\V1\Permission;

use Modules\Permission\Contracts\V1\Repositories\Permission\PermissionRepository;
use Modules\Permission\Entities\V1\Permission\Permission;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function deletePermissionAndChildren(int $id): mixed
    {
        $permission = $this->find($id);

        $permission->children()->delete();

        return $permission;
    }
}
