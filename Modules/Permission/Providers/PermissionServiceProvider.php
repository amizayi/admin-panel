<?php

namespace Modules\Permission\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Permission\Repositories\Contracts\PermissionRepository;
use Modules\Permission\Repositories\Contracts\RoleRepository;
use Modules\Permission\Repositories\Eloquent\PermissionRepositoryEloquent;
use Modules\Permission\Repositories\Eloquent\RoleRepositoryEloquent;

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
