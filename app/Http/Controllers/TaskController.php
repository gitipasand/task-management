<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{

    public $task;
    public $task_service;
    public $project;
    public $view_path;
    public $title;
    public $uri;
    public $paginate;

    public function __construct(Task $task , Project $project , TaskService $task_service)
    {
        $this->task = $task;
        $this->project = $project;
        $this->task_service = $task_service;
        $this->view_path = 'task.';
        $this->uri = 'task';
        $this->paginate = 2;
        $this->title = ['index'=>'Task List','create'=>'Create Task','edit'=>'Edit Task: ','show'=>'Task: '];
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

    public function store(TaskRequest $request): RedirectResponse
    {
        $request['priority'] = $this->task_service->getPriority($request->project_id);
        $this->task->create($request->all());

        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function edit(Task $task)
    {
        $title = $this->title[__FUNCTION__]. $task->title;
        return view($this->view_path.'edit',compact('title','task'));
    }
    public function show(Task $task)
    {
        $title = $this->title[__FUNCTION__] . $task->title;
        return view($this->view_path.'show',compact('title','task'));
    }

    public function update(Task $task , TaskRequest $request): RedirectResponse
    {
        $task->update($request->all());
        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        $this->task_service->updatePriorityTaskDeleted($task);

        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function sort()
    {
        $tasks = request('item');
        $this->task_service->sort($tasks);
    }
}
