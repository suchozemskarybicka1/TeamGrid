<?php
namespace Adrian\TimeEntries\Http\Controllers;

use Adrian\TimeEntries\Models\TimeEntry;
use Adrian\TimeEntries\Http\Resources\TimeEntriesResource;
use Illuminate\Routing\Controller;

class TimeEntriesController extends Controller
{

    public function index()
    {

        return TimeEntry::all();

    }

}