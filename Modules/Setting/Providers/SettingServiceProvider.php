<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Setting\Contracts\V1\Repositories\SettingRepository;
use Modules\Setting\Repositories\V1\SettingRepositoryEloquent;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Setting';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'setting';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRepositories();
    }
    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(SettingRepository::class, SettingRepositoryEloquent::class);
    }
}
