<?php



Route::get('/dev', function () {
    \Modules\LogActivity\Services\Logger::make();
});
