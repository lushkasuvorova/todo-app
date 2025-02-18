<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список дел</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4"><i class="bi bi-list-task"></i> Список дел</h2>

            <!-- Уведомления -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Форма добавления задачи -->
            <form action="{{ route('tasks.store') }}" method="POST" class="mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="task" class="form-control" placeholder="Введите новую задачу" required>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Добавить</button>
                </div>
            </form>

            <!-- Список задач -->
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold">{{ $task->task }}</span>
                        <div>
                            <!-- Кнопка изменения -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $task->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Кнопка удаления -->
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </li>

                    <!-- Модальное окно изменения задачи -->
                    <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Редактировать задачу</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('tasks.update', $task) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <input type="text" name="task" class="form-control" value="{{ $task->task }}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
