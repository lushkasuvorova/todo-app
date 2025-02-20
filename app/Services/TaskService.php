<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class TaskService
{
    public function getAllTasks(): Collection
    {
        return Task::all();
    }

    public function createTask(array $data): Task
    {
        $task = new Task($data);
        $task->validate();
        $task->save();
        return $task;
    }

    public function updateTask(int $id, array $data): Task
    {
        $task = Task::findOrFail($id);
        $task->fill($data);
        $task->validate();
        $task->save();
        return $task;
    }

    public function deleteTask(int $id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}



