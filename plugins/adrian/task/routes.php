<?php

use Adrian\Task\Http\Controllers\TasksController;


Route::group(['prefix' => 'api/v1'], function() {
    Route::group(['prefix' => '/tasks'], function() {
        Route::get('/index', [TasksController::class, 'index']);
        Route::get('/show/{id}', [TasksController::class, 'show']);
        Route::post('/create', [TasksController::class, 'create']);
        Route::post('/edit/{id}', [TasksController::class, 'edit']);
        Route::post('/completed/{id}', [TasksController::class, 'setCompleted']);
    }); 
}); 
