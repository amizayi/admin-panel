<?php


use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/user')->middleware('log.activity')->controller(UserController::class)->group(fn () => [
    Route::get('/',                'index'),
    Route::post('/store',          'store'),
    Route::get('/show/{id}',       'show'),
    Route::put('/update/{id}',     'update'),
    Route::delete('/destroy/{id}', 'destroy')
]);
