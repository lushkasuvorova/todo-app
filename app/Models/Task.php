<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task'];

    // Автоматическая валидация перед сохранением
    public static function boot()
    {
        parent::boot();

        static::saving(function ($task) {
            $task->validate();
        });
    }

    public function validate()
    {
        $validator = Validator::make($this->attributesToArray(), [
            'task' => 'required|string|max:255',
        ], [
            'task.required' => 'Поле "Задача" обязательно для заполнения.',
            'task.string' => 'Поле "Задача" должно быть текстом.',
            'task.max' => 'Максимальная длина задачи — 255 символов.',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // Мутатор для автоочистки ввода
    // public function setTaskAttribute($value)
    // {
    //     $this->attributes['task'] = trim(strip_tags($value)); // Убираем лишние пробелы и HTML-теги
    // }
}
