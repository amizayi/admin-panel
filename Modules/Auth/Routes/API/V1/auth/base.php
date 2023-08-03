<?php

use Modules\Auth\Http\Controllers\Api\V1\BasicAuthController;

Route::prefix('base')

    ->as('base.')

    ->controller(BasicAuthController::class)

    ->group(fn() => [

        Route::post('login', 'login')->name('login'),

        Route::post('register', 'register')->name('register'),

        Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum')

    ]);
