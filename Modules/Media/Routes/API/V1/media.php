<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::prefix('v1/media')

    ->as('api.v1.media.')

    ->middleware('log.activity')

    ->group(fn() => [

        // set storage link directory
        Route::get('/storage-link', fn() => Artisan::call('storage:link'))->name('storage-link')

    ]);
