<?php

use Adrian\Project\Http\Controllers\ProjectsController;


Route::group(['prefix' => 'api/v1'], function() {
    Route::group(['prefix' => '/projects'], function() {
        Route::get('/index', [ProjectsController::class, 'index']);
        Route::get('/all-complete', [ProjectsController::class, 'isComplete']);
        Route::post('/create', [ProjectsController::class, 'create']);
        Route::get('/show/{id}', [ProjectsController::class, 'show']);
        Route::post('/edit/{id}', [ProjectsController::class, 'edit']);
        Route::post('/complete/{id}', [ProjectsController::class, 'complete']);
    }); 
}); 
