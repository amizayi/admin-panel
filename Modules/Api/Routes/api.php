<?php



Route::get('/dev', function () {
    dd('hi');
})->middleware('log.activity');
