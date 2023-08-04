<?php


Route::prefix('v1/profile')

    ->as('api.v1.profile.')

    ->middleware('log.activity')

    ->controller(ProfileController::class)

    ->group(fn() => [

        Route::get('/info',    'info')->name('info'),
        Route::put('/update', 'update')->name('update'),

    ]);
