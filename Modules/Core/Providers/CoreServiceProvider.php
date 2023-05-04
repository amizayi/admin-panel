<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerProviders();
    }


    /**
     * Register providers
     *
     * @return void
     */
    protected function registerProviders(): void
    {
        $this->app->register("Modules\\Core\\Providers\\ModuleServiceProvider");
        $this->app->register("Modules\\Core\\Providers\\ModuleRouteServiceProvider");
    }
}
