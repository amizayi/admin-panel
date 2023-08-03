<?php

namespace Modules\LogActivity\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\LogActivity\Contracts\V1\Repositories\LogActivityRepository;
use Modules\LogActivity\Http\Middleware\V1\LogActivityMiddleware;
use Modules\LogActivity\Repositories\V1\LogActivityRepositoryEloquent;

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
