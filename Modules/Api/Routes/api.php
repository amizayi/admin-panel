<?php



Route::get('/dev', function () {
    dd( user()->all() );
});
