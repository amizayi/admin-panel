<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1/auth')

    ->as('api.v1.auth.')

    ->middleware('log.activity')

    ->group(fn() => [

        // Basic
        require 'auth/base.php',
        // OTP
        require 'auth/otp.php',
        // OAuth
        require 'auth/oauth.php'

]);

