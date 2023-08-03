<?php

use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\Api\V1\Role\RoleController;

Route::prefix('v1/role')

    ->as('api.v1.role.')

    ->middleware('log.activity')

    ->controller(RoleController::class)

    ->group(fn() => [

        Route::get('/',                'index')->name('index'),
        Route::post('/store',          'store')->name('store'),
        Route::get('/show/{id}',       'show')->name('show'),
        Route::put('/update/{id}',     'update')->name('update'),
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')

    ]);

