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
    
    public function isComplete()
    {
        return Project::isComplete()->get();
    }
    
    public function create()
    {
        $project = new Project;
        $project->name = post('name');
        $project->customer = post('customer');
        $project->project_manager = post('project_manager');
        $project->rate = post('rate');
        $project->budget = post('budget');
        $project->is_complete = false;
        $project->slug = Str::slug(post('name'));
        $project->save();

        return ProjectsResource::make($project);
    }
    
    public function show($id)
    {
        return Project::find($id);
    }
    
    
    public function edit($id)
    {
        $project = Project::where('id', $id)->firstOrFail();

        $project->name = post('name') ?: $project->name;
        $project->customer = post('customer') ?: $project->customer;
        $project->project_manager = post('project_manager')  ?: $project->project_manager;
        $project->rate = post('rate')  ?: $project->rate;
        $project->budget = post('budget')  ?: $project->budget;
        $project->is_complete = post('is_complete')  ?: $project->is_complete;
        $project->save();

        return ProjectsResource::make($project);
    }

    public function complete($id)
    {
        $project = Project::where('id', $id)->firstOrFail();
        
        $project->complete = true;

        $project->save();

        return ProjectsResource::make($project);
    }
        
}