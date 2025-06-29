# Laravel Setup

## 🚀 Разворачивание проекта

1. **Склонируйте репозиторий:**
   ```bash
   git clone https://github.com/todo-app.git
   cd todo-app

2. **Скопируйте .env файл:**
   ```bash
   cp .env.example .env

3. **Сгенерируйте ключ приложения:**
   ```bash
   php artisan key:generate
   php artisan config:clear

4. **Создайте базу данных todo_db в MySQL и выполните миграции:**
   ```bash
   sudo mysql
   create database todo_db;
   exit
   php artisan migrate

5. **Запустите приложение:**
    ```bash
   php artisan serve

6. **Перейдите в браузер:**
   Приложение будет доступно по адресу http://127.0.0.1:8000/

# Laravel Docker Setup

## 🚀 Разворачивание проекта

1. **Склонируйте репозиторий**:
   ```bash
   git clone https://github.com/todo-app.git
   cd todo-app

2. **Скопируйте .env файл:**:
   ```bash
   cp .env.example .env

3. **Запустите контейнеры:**:
   ```bash
   docker compose up --build -d

4. **Сгенерируйте ключ приложения:**:
   ```bash
   docker exec -it todo_app php artisan key:generate
   docker exec -it todo_app php artisan config:clear

5. **Выполните миграции базы данных:**:
   ```bash
   docker exec -it todo_app php artisan migrate

6. **Перейдите в браузер:**:
   Приложение будет доступно по адресу http://127.0.0.1:8000/
