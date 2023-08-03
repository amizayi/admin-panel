<?php

use Modules\Auth\Http\Controllers\Api\V1\OAuth\GoogleAuthController;

Route::prefix('google')

    ->as('google.')

    ->controller(GoogleAuthController::class)

    ->group(fn() => [

        Route::get('redirect', 'redirect')->name('redirect'),
        Route::get('callback', 'callback')->name('callback')

    ]);
