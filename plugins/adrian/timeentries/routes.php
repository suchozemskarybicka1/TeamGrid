<?php

use Adrian\TimeEntries\Http\Controllers\TimeEntriesController;
use Adrian\TimeEntries\Models\TimeEntry;


Route::get('time-entries', [TimeEntriesController::class, 'index']);

Route::get('time-entries-2', function () {
    return TimeEntry::all();
});