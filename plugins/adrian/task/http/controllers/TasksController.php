<?php
namespace Adrian\Task\Http\Controllers;

use Adrian\Task\Models\Task;
use Adrian\Task\Http\Resources\TasksResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function index()
    {
        return TasksResource::collection(Task::all());
    }
    
    public function show($id)
    {
        return Task::find($id);
    }
    
    public function create()
    {
        $task = new Task;
        $task->name = post('name');
        $task->assignee = post('assignee');
        $task->project_id = post('project_id');
        $task->user_id = Auth::user()->id;
        $task->start_date = post('start_date');
        $task->end_date = post('end_date');
        $task->save();

        return TasksResource::make($task);
    }
    
    
    
    public function edit($id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        $task->name = post('name') ?: $task->name;
        $task->assignee = post('assignee') ?: $task->assignee;
        $task->project_id = post('project_id') ?: $task->project_id;
        $task->start_date = post('start_date')  ?: $task->start_date;
        $task->end_date = post('end_date')  ?: $task->end_date;
        $task->save();

        return TasksResource::make($task);
    }

    public function setCompleted($id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        
        $task->is_completed = true;

        $task->save();

        return TasksResource::make($task);
    }
        
}