<?php

namespace Modules\Permission\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Permission\Repositories\Contracts\PermissionRepository;
use Modules\Permission\Repositories\Eloquent\PermissionRepositoryEloquent;

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
    public function boot()
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
    }
}
