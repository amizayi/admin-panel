<?php



Route::get('/dev', function () {
    return true;
})->middleware('log.activity');

Route::get('/test', function () {
    return true;
});
