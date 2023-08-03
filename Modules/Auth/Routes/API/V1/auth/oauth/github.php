<?php

use Modules\Auth\Http\Controllers\Api\V1\OAuth\GithubAuthController;

Route::prefix('github')

    ->as('github.')

    ->controller(GithubAuthController::class)

    ->group(fn() => [

        Route::get('redirect', 'redirect')->name('redirect'),
        Route::get('callback', 'callback')->name('callback')

    ]);
