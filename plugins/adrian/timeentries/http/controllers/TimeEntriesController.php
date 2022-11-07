<?php

namespace Adrian\TimeEntries\Http\Controllers;

use Adrian\TimeEntries\Http\Resources\TimeEntriesResource;
use Adrian\TimeEntries\Models\TimeEntry;
use Illuminate\Routing\Controller;


class TimeEntriesController extends Controller
{

    public function index()
    {
        return TimeEntriesResource::collection(TimeEntry::all());
    }

}