<?php

namespace Modules\Kernel\Providers;

use Illuminate\Support\ServiceProvider;

class KernelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerException();
    }

    /**
     * Register the exceptions.
     *
     * @return void
     */
    private function registerException(): void
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Modules\Kernel\Exceptions\V1\ApiExceptionHandler::class
        );
    }
}
