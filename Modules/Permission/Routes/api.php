<?php


use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\Api\RoleController;
use Modules\Permission\Http\Controllers\Api\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/role')->middleware('log.activity')->controller(RoleController::class)->group(fn() => [
    Route::get('/',                'index'),
    Route::post('/store',          'store'),
    Route::get('/show/{id}',       'show'),
    Route::put('/update/{id}',     'update'),
    Route::delete('/destroy/{id}', 'destroy')
]);

Route::prefix('/permission')->middleware('log.activity')->controller(PermissionController::class)->group(fn() => [
    Route::get('/',          'index'),
    Route::get('/show/{id}', 'show')
]);
