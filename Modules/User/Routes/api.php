<?php


use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Api\UserController;

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

Route::prefix('/user')->middleware('log.activity')->controller(UserController::class)->group(function () {
    Route::get('/',                'index');
    Route::post('/store',          'store');
    Route::get('/show/{id}',       'show');
    Route::put('/update/{id}',     'update');
    Route::delete('/destroy/{id}', 'destroy');
});
