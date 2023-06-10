<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Laravel\Module;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register(): void
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

        foreach ($modules as $module) {
            $this->loadTranslations($module);
            $this->loadConfigs($module);
            $this->loadMigrations($module);
        }
    }

    /**
     * Load translations for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadTranslations(Module $module): void
    {
        $translationsPath = "{$module->getPath()}/Lang";
        $this->loadTranslationsFrom($translationsPath, $module->get('alias'));
    }

    /**
     * Load configs for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadConfigs(Module $module): void
    {
        collect(
            [
                'config' => "{$module->getPath()}/Config/config.php",
                'policy' => "{$module->getPath()}/Config/policy.php",
            ])
            ->filter(function ($path) {
                return file_exists($path);
            })
            ->each(function ($path, $filename) use ($module) {
                $this->mergeConfigFrom($path, "{$module->get('alias')}.$filename");
            });
    }

    /**
     * Load migrations for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadMigrations(Module $module): void
    {
        $this->loadMigrationsFrom("{$module->getPath()}/Database/Migrations");
    }
}
