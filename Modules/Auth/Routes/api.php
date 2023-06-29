<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\BasicAuthController;
use Modules\Auth\Http\Controllers\Api\OtpController;

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

Route::prefix('auth')->group(function () {
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
});

