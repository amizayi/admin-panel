<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Nwidart\Modules\Laravel\Module;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function register(): void
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

        foreach ($modules as $module) {
            $this->loadTranslations($module);
            $this->loadConfigs($module);
            $this->loadMigrations($module);
            $this->registerPolicies($module);
        }
    }

    /**
     * Load translations for the given module.
     */
    private function loadTranslations(Module $module): void
    {
        $translationsPath = "{$module->getPath()}/Lang";
        $this->loadTranslationsFrom($translationsPath, $module->get('alias'));
    }

    /**
     * Load configs for the given module.
     */
    private function loadConfigs(Module $module): void
    {
        collect(
            [
                'config' => "{$module->getPath()}/Config/config.php",
                'filament' => "{$module->getPath()}/Config/filament.php",
                'permissions' => "{$module->getPath()}/Config/permissions.php",
                'policy' => "{$module->getPath()}/Config/policy.php",
                'dev_seeder' => "{$module->getPath()}/Config/seeder.php",
            ])
            ->filter(function ($path) {
                return file_exists($path);
            })
            ->each(function ($path, $filename) use ($module) {
                $file = Str::of($filename);

                if ($file->startsWith('dev_') && !$this->app->runningInConsole()) {
                    return;
                }

                $filename = $file->replaceFirst('dev_', '')->toString();

                $this->mergeConfigFrom($path, "{$module->get('alias')}.$filename");
            });
    }

    /**
     * Load migrations for the given module.
     */
    private function loadMigrations(Module $module): void
    {
        $this->loadMigrationsFrom("{$module->getPath()}/Database/Migrations");
    }

    /**
     * Register Module policies
     */
    private function registerPolicies(Module $module): void
    {
        $policy_path = "{$module->getPath()}/Policies";

        if (!file_exists($policy_path)) {
            return;
        }

        $policies = scandir($policy_path);

        foreach ($policies as $policy) {
            if (!preg_match('/^(.+)\.php$/', $policy, $matches)) {
                continue;
            }

            $policy_class = "Modules\\{$module->getStudlyName()}\\Policies\\$matches[1]";

            if (!class_exists($policy_class)) {
                continue;
            }

            $target_entity = $policy_class::$entity;

            if (isset($target_entity) && class_exists($target_entity)) {
                Gate::policy($target_entity, $policy_class);
            }
        }
    }
}
