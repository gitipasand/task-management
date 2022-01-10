<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getPriority($project_id)
    {
        return Task::query()->where('project_id',$project_id)->max('priority')+1;
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

    public function sort(array $tasks)
    {
        foreach ($tasks as $key=> $record){
            Task::query()->findOrFail($record)->update(['priority'=>$key+1]);
        }
    }
}
