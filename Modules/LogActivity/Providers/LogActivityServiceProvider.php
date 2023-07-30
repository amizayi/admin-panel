<?php

namespace Modules\LogActivity\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\LogActivity\Http\Middleware\LogActivityMiddleware;

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
    }

    protected function registerMiddlewares(): void
    {
        $router = $this->app['router'];
        // Register the middleware for web routes
        $router->aliasMiddleware('log.activity', LogActivityMiddleware::class);
    }
}
