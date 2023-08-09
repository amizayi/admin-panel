<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleRouteServiceProvider extends ServiceProvider
{
    /**
     * Maps the web and API routes for all enabled modules.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapModuleRoutes($this->app['modules']->allEnabled());
    }

    /**
     * Maps the web and API routes for the given modules.
     *
     * @param iterable $modules The modules to map routes for.
     *
     * @return void
     */
    private function mapModuleRoutes(iterable $modules): void
    {
        foreach ($modules as $module) {
            $base = $module->getPath();
            $this->mapWebRoutes("$base/Routes/web.php");
            $this->mapApiRoutes("$base/Routes/api.php");
        }
    }

    /**
     * Maps web routes for a given path.
     *
     * @param string $path The path to the web routes file.
     *
     * @return void
     */
    private function mapWebRoutes(string $path): void
    {
        $this->mapRoutes($path, ['web']);
    }

    /**
     * Maps API routes for a given path.
     *
     * @param string $path The path to the API routes file.
     *
     * @return void
     */
    private function mapApiRoutes(string $path): void
    {
        $this->mapRoutes($path, ['api'], 'api');
    }

    /**
     * Maps routes for a given path and middleware.
     *
     * @param string      $path        The path to the routes file.
     * @param array       $middlewares The middleware to apply to the routes.
     * @param string|null $prefix      The route prefix (for API routes).
     *
     * @return void
     */
    private function mapRoutes(string $path, array $middlewares, ?string $prefix = null): void
    {
        if (!file_exists($path)) return;

        Route::group(['middleware' => $middlewares, 'prefix' => $prefix], fn() => require_once $path);
    }

}
