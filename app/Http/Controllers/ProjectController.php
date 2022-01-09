<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public $project;
    public $view_path;
    public $title;
    public $uri;
    public $paginate;

    public function __construct(Project $project)
    {
        $this->project = $project;
        $this->view_path = 'project.';
        $this->uri = 'project';
        $this->paginate = 2;
        $this->title = ['index'=>'Project List','create'=>'Create Project','edit'=>'Edit Project: ','show'=>'Project: '];
    }

    public function index()
    {
        $title = $this->title[__FUNCTION__];
        $projects = $this->project->all();
        return view($this->view_path.'index',compact('title','projects'));
    }

    public function create()
    {
        $title = $this->title[__FUNCTION__];
        return view($this->view_path.'create',compact('title'));
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $this->project->create($request->all());
        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function edit(Project $project)
    {
        $title = $this->title[__FUNCTION__]. $project->title;
        return view($this->view_path.'edit',compact('title','project'));
    }
    public function show(Project $project)
    {
        $title = $this->title[__FUNCTION__] . $project->title;
        return view($this->view_path.'show',compact('title','project'));
    }

    public function update(Project $project , ProjectRequest $request): RedirectResponse
    {
        $project->update($request->all());
        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function destroy(Project $project): RedirectResponse
    {
        try{
            $project->delete();
            return redirect()->intended($this->uri)->with('success',$this->success_message);

        }catch (\Exception $exception){
            return redirect()->intended($this->uri)->with('error',$this->error_message);
        }
    }

    public function getProjectTasks(Request $request)
    {
        $tasks = Project::query()->findOrFail($request->project_id)->tasks;
        return view('layouts.partials.tasks-list',compact('tasks'));
    }
}
