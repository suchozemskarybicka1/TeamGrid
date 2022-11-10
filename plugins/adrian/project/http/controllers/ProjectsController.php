<?php
namespace Adrian\Project\Http\Controllers;

use Adrian\Project\Models\Project;
use Adrian\Project\Http\Resources\ProjectsResource;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{

    public function index()
    {
        //vrati vsetky
        return ProjectsResource::collection(Project::all());
    }
    
    public function create()
    {
        // vytvori novy
        $project = new Project;
        $project->name = post('name');
        $project->customer = post('customer');
        $project->project_manager = post('project_manager');
        $project->rate = post('rate');
        $project->budget = post('budget');
        $project->save();

        return ProjectsResource::make($project);
    }
    
    public function show($id)
    {
        // vrati konkretny
        return Project::find($id);
    }
    
    
    public function edit($id)
    {
        // upravi konkretny
        $project = Project::where('id', $id)->firstOrFail();

        $project->name = post('name') ?: $project->name;
        $project->customer = post('customer') ?: $project->customer;
        $project->project_manager = post('project_manager')  ?: $project->project_manager;
        $project->rate = post('rate')  ?: $project->rate;
        $project->budget = post('budget')  ?: $project->budget;
        $project->save();

        return ProjectsResource::make($project);
    }

    public function complete($id)
    {
        // uzavrie projekt
        $project = Project::where('id', $id)->firstOrFail();
        
        $project->complete = true;

        $project->save();

        return ProjectsResource::make($project);
    }
        
}