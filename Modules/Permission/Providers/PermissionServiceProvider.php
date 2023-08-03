<?php

namespace Modules\Permission\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Permission\Contracts\V1\Repositories\Permission\PermissionRepository;
use Modules\Permission\Contracts\V1\Repositories\Role\RoleRepository;
use Modules\Permission\Repositories\V1\Permission\PermissionRepositoryEloquent;
use Modules\Permission\Repositories\V1\Role\RoleRepositoryEloquent;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Permission';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'permission';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRepositories();
    }
    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class,       RoleRepositoryEloquent::class);
    }
}
