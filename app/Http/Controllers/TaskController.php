<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public $task;
    public $view_path;
    public $title;
    public $uri;
    public $paginate;

    public function __construct(Task $task)
    {
        $this->task = $task;
        $this->view_path = 'task.';
        $this->uri = 'task';
        $this->paginate = 2;
        $this->title = ['index'=>'Task List','create'=>'Create Task','edit'=>'Edit Task: ','show'=>'Task: '];
    }

    public function index()
    {
        $title = $this->title[__FUNCTION__];
        $tasks = $this->task->all();
        return view($this->view_path.'index',compact('title','tasks'));
    }

    public function create()
    {
        $title = $this->title[__FUNCTION__];
        return view($this->view_path.'create',compact('title'));
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $request['priority'] = Task::getPriority($request->project_id);
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
        $this->updatePriorityTaskDeleted($task);
        return redirect()->intended($this->uri)->with('success',$this->success_message);
    }

    public function updatePriorityTaskDeleted(Task $task): void
    {
        $tasks = Task::query()
            ->where('project_id', $task->project_id)
            ->where('priority', '>', $task->priority)->get();

        foreach ($tasks as $record) {
            $record->update(['priority' => $record->priority - 1]);
        }
    }
}
