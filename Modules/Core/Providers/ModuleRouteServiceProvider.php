<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Nwidart\Modules\Laravel\Module;

class ModuleRouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(): void
    {
        $this->initModules();
    }

    /**
     * Initialize specified list of modules.
     *
     * @note if module list not specified, all enabled modules will list.
     *
     * @return void
     */
    private function initModules(): void
    {
        $modules = $this->app['modules']->allEnabled();

        foreach ($modules as $module)
            $this->mapModuleRoutes($module);
    }


    /**
     * Map routes of the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function mapModuleRoutes(Module $module): void
    {
        $base = $module->getPath();
        $this->mapWebRoutes("$base/Routes/web.php");
        $this->mapApiRoutes("$base/Routes/api.php");
    }

    /**
     * Map public routes.
     *
     * @param string $path
     *
     * @return void
     */
    private function mapWebRoutes(string $path): void
    {
        if (!file_exists($path)) return;

        Route::group(['middleware' => ['web']], fn() => require_once $path);
    }

    /**
     * Map api routes.
     *
     * @param $path
     *
     * @return void
     */
    private function mapApiRoutes($path): void
    {
        if (!file_exists($path)) return;

        Route::group(['prefix' => 'api', 'middleware' => ['api']], fn() => require_once $path);
    }
}
