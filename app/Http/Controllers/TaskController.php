<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Validation\ValidationException;

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
        try {
            $this->taskService->createTask($request->all());
            return redirect()->route('tasks.index')->with('success', 'Задача успешно добавлена!');
        } catch (ValidationException $e) {
            return redirect()->route('tasks.index')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Ошибка при добавлении задачи.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->taskService->updateTask($id, $request->all());
            return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
        } catch (ValidationException $e) {
            return redirect()->route('tasks.index')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Ошибка при обновлении задачи.');
        }
    }

    public function destroy($id)
    {
        try {
            $this->taskService->deleteTask($id);
            return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Ошибка при удалении задачи.');
        }
    }
}

