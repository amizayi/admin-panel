<?php

namespace Modules\Permission\Repositories\Eloquent;

use Modules\Permission\Entities\Permission;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Modules\Permission\Repositories\Contracts\PermissionRepository;

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
