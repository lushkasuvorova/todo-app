<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask(string $taskName)
    {
        return Task::create(['task' => $taskName]);
    }

    public function updateTask(Task $task, string $newName)
    {
        return $task->update(['task' => $newName]);
    }

    public function deleteTask(Task $task)
    {
        return $task->delete();
    }
}
