<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255'
        ]);

        Task::create(['task' => $request->task]);

        return redirect()->route('tasks.index')->with('success', 'Задача добавлена!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task' => 'required|string|max:255'
        ]);

        $task->update(['task' => $request->task]);

        return redirect()->route('tasks.index')->with('success', 'Задача обновлена!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Задача удалена!');
    }
}
