<?php

use Adrian\Project\Http\Controllers\ProjectsController;


Route::group(['prefix' => 'api/v1'], function() {
    Route::group(['prefix' => '/projects'], function() {
        Route::get('/index', [ProjectsController::class, 'index']);
        Route::get('/all-complete', [ProjectsController::class, 'isCompleted']);
        Route::get('/show/{key}', [ProjectsController::class, 'show']);

        Route::middleware(['auth'])->group(function() {
            Route::post('/create', [ProjectsController::class, 'create']);
            Route::post('/edit/{key}', [ProjectsController::class, 'edit']);
            Route::post('/completed/{key}', [ProjectsController::class, 'setCompleted']);
        }); 
    });
    

}); 
