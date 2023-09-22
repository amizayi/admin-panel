<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Nwidart\Modules\Laravel\Module;

class ModuleRouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->initModules();
    }

    /**
     * Initialize specified list of modules.
     *
     * @note if module list not specified, all enabled modules will list.
     */
    private function initModules(): void
    {
        $modules = $this->app['modules']->allEnabled();

        foreach ($modules as $module)
        {
            $this->mapModuleRoutes($module);
        }
    }

    /**
     * Map routes of the given module.
     */
    private function mapModuleRoutes(Module $module): void
    {
        $base = $module->getPath();
        $this->mapPublicRoutes("$base/Routes/web.php");
        $this->mapApiRoutes("$base/Routes/api.php");
    }

    /**
     * Map public routes.
     */
    private function mapPublicRoutes(string $path): void
    {
        if (!file_exists($path))
        {
            return;
        }

        Route::group(
            [
                'middleware' => ['web'],
            ],
            fn() => require $path,
        );
    }

    /**
     * Map api routes.
     */
    private function mapApiRoutes($path): void
    {
        if (!file_exists($path))
        {
            return;
        }

        Route::group(
            [
                'prefix'     => 'api',
                'middleware' => ['api'],
            ],
            fn() => require $path,
        );
    }
}
