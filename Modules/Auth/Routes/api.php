<?php

use Modules\Auth\Http\Controllers\Api\OAuth\GithubAuthController;
use Modules\Auth\Http\Controllers\Api\BasicAuthController;
use Modules\Auth\Http\Controllers\Api\OAuth\GoogleAuthController;
use Modules\Auth\Http\Controllers\Api\OtpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->middleware('log.activity')->group(fn() => [
    // Basic
    Route::prefix('base')->controller(BasicAuthController::class)->group(fn() => [
        Route::post('login',    'login'),
        Route::post('register', 'register'),
        Route::post('logout',   'logout')->middleware('auth:sanctum')
    ]),
    // OTP
    Route::prefix('otp')->controller(OtpController::class)->group(fn() => [
        Route::post('send',   'send'),
        Route::post('verify', 'verify')
    ]),
    // OAuth
    Route::prefix('oauth')->group(fn() => [
        // Github
        Route::prefix('github')->controller(GithubAuthController::class)->group(fn () => [
            Route::get('redirect', 'redirect'),
            Route::get('callback', 'callback')
        ]),
        // Google
        Route::prefix('google')->controller(GoogleAuthController::class)->group(fn () => [
            Route::get('redirect', 'redirect'),
            Route::get('callback', 'callback')
        ]),
    ])
]);

