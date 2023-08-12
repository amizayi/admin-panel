<?php

use Modules\Auth\Http\Controllers\Api\V1\OAuth\FaceBookAuthController;

Route::prefix('facebook')

    ->as('facebook.')

    ->controller(FaceBookAuthController::class)

    ->group(fn() => [

        Route::get('redirect', 'redirect')->name('redirect'),
        Route::get('callback', 'callback')->name('callback')

    ]);
