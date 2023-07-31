<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('media')->middleware('log.activity')->group(fn() => [
    // set storage link directory
    Route::get('/storage-link', fn() => [
        Artisan::call('storage:link')
    ])
]);
