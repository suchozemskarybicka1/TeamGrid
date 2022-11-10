<?php

use Adrian\TimeEntry\Http\Controllers\TimeEntriesController;

Route::get('start-time', [TimeEntriesController::class, 'startTime']);
Route::get('end-time', [TimeEntriesController::class, 'endTime']);
