<?php
namespace Adrian\TimeEntry\Http\Controllers;

use Adrian\TimeEntry\Models\TimeEntry;
use Adrian\Task\Models\Task;
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
        
        $task = Task::find($timeEntry->task_id);
        $tracked_time = $task->tracked_time;

        $start_time = $timeEntry->start_time;
        $new_time = now()->diff($start_time)->format('H:i:s');

        $task->$tracked_time = $tracked_time + $new_time;
        
        $task->save();

        return TimeEntriesResource::make($timeEntry);
    }

}