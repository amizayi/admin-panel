<?php

use Modules\Auth\Http\Controllers\Api\V1\OtpController;

Route::prefix('otp')

    ->as('otp.')

    ->controller(OtpController::class)

    ->group(fn() => [

        Route::post('send', 'send')->name('send'),
        Route::post('verify', 'verify')->name('verify')

]);
