<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $this->taskService->createTask($request->task);
        return redirect()->route('tasks.index')->with('success', 'Задача добавлена!');
    }

    public function update(Request $request, Task $task)
    {
        $this->taskService->updateTask($task, $request->task);
        return redirect()->route('tasks.index')->with('success', 'Задача обновлена!');
    }

    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);
        return redirect()->route('tasks.index')->with('success', 'Задача удалена!');
    }
}


