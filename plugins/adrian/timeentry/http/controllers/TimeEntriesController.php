<?php
namespace Adrian\TimeEntry\Http\Controllers;

use Adrian\TimeEntry\Models\TimeEntry;
use Adrian\TimeEntry\Http\Resources\TimeEntriesResource;
use Illuminate\Routing\Controller;

class TimeEntriesController extends Controller
{
    
    public function startTime()
    {
        
        $timeEntry = new TimeEntry;
        $timeEntry->task_id = post('task_id');
        $timeEntry->start_time = now();
        $timeEntry->save();

        return TimeEntriesResource::make($timeEntry);
    }
    
    
    
    public function endTime($id)
    {
        $timeEntry = TimeEntry::find($id);

        $timeEntry->end_time = now();
        $timeEntry->save();

        return TimeEntriesResource::make($timeEntry);
    }

}