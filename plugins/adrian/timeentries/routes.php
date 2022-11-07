<?php

use Adrian\TimeEntries\Http\Controllers\TimeEntriesController;


Route::get('time-entries', [TimeEntriesController::class, 'index']);