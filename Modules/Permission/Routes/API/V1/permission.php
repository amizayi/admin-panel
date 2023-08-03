<?php

use Modules\Permission\Http\Controllers\Api\V1\Permission\PermissionController;

Route::prefix('v1/permission')

    ->as('api.v1.permission.')

    ->middleware('log.activity')

    ->controller(PermissionController::class)

    ->group(fn() => [

        Route::get('/', 'index')->name('index'),
        Route::get('/show/{id}', 'show')->name('show')

    ]);
