<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application config.
     */
    public function boot(): void
    {
        $this->syncLocale();
        $this->registerProviders();
    }

    /**
     * Sync app locale
     */
    protected function syncLocale(): void
    {
        Lang::setLocale(Config::get('app.locale'));
    }

    /**
     * Register providers
     */
    protected function registerProviders(): void
    {
        $this->app->register('Modules\\Core\\Providers\\ModuleServiceProvider');
        $this->app->register('Modules\\Core\\Providers\\ModuleRouteServiceProvider');
    }
}
