<?php


use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\Api\RoleController;
use Modules\Permission\Http\Controllers\Api\PermissionController;

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

Route::prefix('/role')->middleware('log.activity')->controller(RoleController::class)->group(function () {
    Route::get('/',                'index');
    Route::post('/store',          'store');
    Route::get('/show/{id}',       'show');
    Route::put('/update/{id}',     'update');
    Route::delete('/destroy/{id}', 'destroy');
});

Route::prefix('/permission')->middleware('log.activity')->controller(PermissionController::class)->group(function () {
    Route::get('/',          'index');
    Route::get('/show/{id}', 'show');

});
