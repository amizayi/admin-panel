<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\User\Repositories\Contracts\UserRepository;
use Modules\User\Repositories\Eloquent\UserRepositoryEloquent;

class UserServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'User';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'user';

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
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
    }
}
