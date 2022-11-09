<?php
namespace Adrian\TimeEntry\Http\Controllers;

use Adrian\TimeEntry\Models\TimeEntry;
use Adrian\TimeEntry\Http\Resources\TimeEntriesResource;
use Illuminate\Routing\Controller;

class TimeEntriesController extends Controller
{

    public function startTime()
    {

        return TimeEntriesResource::collection(TimeEntry::select('start_time')->get());

    }

    public function endTime()
    {

        return TimeEntriesResource::collection(TimeEntry::select('end_time')->get())

    }

}