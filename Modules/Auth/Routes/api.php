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
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->middleware('log.activity')->group(function () {
    // Basic
    Route::prefix('base')->controller(BasicAuthController::class)->group(function () {
        Route::post('login',       'login');
        Route::post('register', 'register');
        Route::post('logout',     'logout')->middleware('auth:sanctum');
    });
    // OTP
    Route::prefix('otp')->controller(OtpController::class)->group(function () {
        Route::post('send',     'send');
        Route::post('verify', 'verify');
    });
    // OAuth
    Route::prefix('oauth')->group(function () {
        // Github
        Route::prefix('github')->controller(GithubAuthController::class)->group(function () {
            Route::get('redirect', 'redirect');
            Route::get('callback', 'callback');
        });
        // Google
        Route::prefix('google')->controller(GoogleAuthController::class)->group(function () {
            Route::get('redirect', 'redirect');
            Route::get('callback', 'callback');
        });
    });
});

