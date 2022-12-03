<?php
namespace Adrian\TimeEntry\Http\Controllers;

use Adrian\TimeEntry\Models\TimeEntry;
use Adrian\TimeEntry\Http\Resources\TimeEntriesResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TimeEntriesController extends Controller
{
    
    public function startTime()
    {
        
        $timeEntry = new TimeEntry;
        
        $timeEntry->user_id = Auth::user()->id;

        $timeEntry->task_id = post('task_id');
        $timeEntry->start_time = now();
        $timeEntry->save();

        return TimeEntriesResource::make($timeEntry);
    }
    
    
    public function endTime($id)
    {
        $timeEntry = TimeEntry::find($id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        $timeEntry->end_time = now();
        $timeEntry->save();
  
        return TimeEntriesResource::make($timeEntry);
    }

} 