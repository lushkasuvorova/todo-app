<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список дел</title>
</head>
<body>
    <h1>Список дел</h1>
    
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="task" required>
        <button type="submit">Добавить</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->task }}
                <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="task" value="{{ $task->task }}">
                    <button type="submit">Изменить</button>
                </form>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
