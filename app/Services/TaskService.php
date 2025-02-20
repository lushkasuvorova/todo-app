<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function getAllTasks(): Collection
    {
        return Task::all();
    }

    public function createTask(string $taskName): Task
    {
        $task = new Task(['task' => $taskName]);
        $task->validate();
        $task->save();
        return $task;
    }

    public function updateTask(Task $task, string $newName): bool
    {
        $task->task = $newName;
        $task->validate();
        return $task->save();
    }

    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}

