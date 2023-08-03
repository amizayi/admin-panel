<?php

namespace Modules\LogActivity\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\LogActivity\Contracts\Repositories\LogActivityRepository;
use Modules\LogActivity\Http\Middleware\LogActivityMiddleware;
use Modules\LogActivity\Repositories\LogActivityRepositoryEloquent;

class LogActivityServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        // Register the middlewares
        $this->registerMiddlewares();
        // Register the repositories
        $this->registerRepositories();
    }

    private function registerMiddlewares(): void
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('log.activity', LogActivityMiddleware::class);
    }

    private function registerRepositories(): void
    {
        $this->app->bind(LogActivityRepository::class,LogActivityRepositoryEloquent::class);
    }
}
