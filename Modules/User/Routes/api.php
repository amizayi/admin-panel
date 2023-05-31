<?php


use Modules\User\Http\Controllers\UserController;
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

Route::prefix('/user')->controller(UserController::class)->group(function () {
    Route::get('/',                   'index');
    Route::post('/store',             'store');
    Route::put('/update',             'store');
    Route::delete('/destroy',       'destroy');
    Route::post('/multi-delete',     'delete');
});
