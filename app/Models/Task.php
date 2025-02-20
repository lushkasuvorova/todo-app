<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    // Метод валидации
    public function validate()
    {
        $validator = validator(['task' => $this->task], [
            'task' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // Мутатор для автоочистки ввода
    public function setTaskAttribute($value)
    {
        $this->attributes['task'] = trim(strip_tags($value)); // Убираем лишние пробелы и HTML-теги
    }
}