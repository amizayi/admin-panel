<?php

use Modules\User\Http\Controllers\Api\V1\UserController;

Route::prefix('v1/user')

    ->as('api.v1.user.')

    ->middleware('log.activity')

    ->controller(UserController::class)

    ->group(fn() => [

        Route::get('/', 'index')->name('index'),
        Route::post('/store', 'store')->name('store'),
        Route::get('/show/{id}', 'show')->name('show'),
        Route::put('/update/{id}', 'update')->name('update'),
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')

    ]);
