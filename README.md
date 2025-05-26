# TaskManager App

A simple task management application built with **Laravel 6** and **PHP 7**, featuring projects and nested tasks with priority levels. Tasks can be reordered using a **drag-and-drop** interface for better organization and control.

> 🕘 This is a reupload of a small test project originally built 5 years ago, now containerized with Docker for easier setup and portability.

## Technologies

- PHP 7.2+
- Laravel 6.x
- MySQL 5.7 (via Docker)
- jQuery + jQuery UI
- Bootstrap 4 (optional for UI)
- Docker + Docker Compose (for local environment)


## Setup 

> This project uses Docker for easy setup and environment isolation.

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/taskmanager-app.git
cd taskmanager-laravel
```

### 2. Copy environment file

```bash
cp .env.example .env
```
### 3. Update .env values

```bash
DB_DATABASE=taskmanager
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Build and run containers

```bash
docker-compose up -d --build
```
This will start two containers:
- laravel_app – running PHP/Laravel
- laravel_mysql – running MySQL 5.7 (on port 3336)

### 4. Install PHP dependencies inside the container

```bash
docker exec -it laravel_app composer install
```

### 5. Generate app key
```bash
docker exec -it laravel_app php artisan key:generate
```
### 6. Run database migrations
```bash
docker exec -it laravel_app php artisan migrate
```

## Usage
Visit the app in your browser:
```bash
http://localhost:8000
```
There, you can:
- Create new Projects
- Add Tasks to each Project
- Prioritize and reorder tasks with drag-and-drop

## Example

![taskmanager gif](/public/taskmanager.gif)

