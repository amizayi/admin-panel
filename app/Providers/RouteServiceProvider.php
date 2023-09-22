<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public static function home(): string
    {
        return route(env('HOME_ROUTE_NAME', 'home'));
    }
}
