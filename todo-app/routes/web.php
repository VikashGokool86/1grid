<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Task;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $tasks = Task::all();

    // To get all tasks completed, ordered by date added
    $tasks_done = Task::where('completed', 1)
        ->orderBy('created_at')
        ->get();
    // To get all tasks not completed, ordered by date added
    $tasks_not_done = Task::where('completed', 0)
        ->orderBy('created_at')
        ->get();

    return Inertia::render('Dashboard', ['tasks_done' => $tasks_done, 'tasks_not_done' => $tasks_not_done]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/task', [TaskController::class, 'add_task'])->name('task.add_task');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    //
    // Route::get('/tasks', [TaskController::class, 'show']);


});



require __DIR__ . '/auth.php';
