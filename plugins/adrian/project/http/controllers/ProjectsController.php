<?php
namespace Adrian\Project\Http\Controllers;

use Adrian\Project\Models\Project;
use Adrian\Project\Http\Resources\ProjectsResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{

    public function index()
    {
        return ProjectsResource::collection(Project::all());
    }
    
    public function isCompleted()
    {
        return Project::isCompleted()->get();
    }
    
    public function create()
    {
        $project = new Project;
        $project->name = post('name');
        $project->customer = post('customer');
        $project->project_manager_id = Auth::user()->id;
        $project->rate = post('rate');
        $project->budget = post('budget');
        $project->is_completed = false;
        $project->slug = Str::slug(post('name'));
        $project->save();

        return ProjectsResource::make($project);
    }
    
    public function show($key)
    {
        return Project::where('id', $key)->orWhere('slug', $key)->firstOrFail();
    }
    
    
    public function edit($key)
    {
        $project = Project::where('id', $key)
            ->orWhere('slug', $key)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        $project->name = post('name') ?: $project->name;
        $project->customer = post('customer') ?: $project->customer;
        $project->project_manager = post('project_manager')  ?: $project->project_manager;
        $project->rate = post('rate')  ?: $project->rate;
        $project->budget = post('budget')  ?: $project->budget;
        $project->is_completed = post('is_completed')  ?: $project->is_completed;
        $project->save();

        return ProjectsResource::make($project);
    }

    public function setCompleted($key)
    {
        $project = Project::where('id', $key)
            ->orWhere('slug', $key)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        
        $project->is_completed = true;

        $project->save();

        return ProjectsResource::make($project);
    }
        
}