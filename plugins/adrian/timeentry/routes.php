<?php

use Adrian\TimeEntry\Http\Controllers\TimeEntriesController;

Route::group(['prefix' => 'api/v1'], function() {
    Route::group(['prefix' => '/time-entries'], function() {
        Route::post('/start', [TimeEntriesController::class, 'startTime']);
        Route::post('/end/{id}', [TimeEntriesController::class, 'endTime']);
    }); 
}); 
