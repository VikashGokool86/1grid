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

    // To get all tasks , ordered by completed then by date updated
    $tasks = Task::orderBy('completed')
             ->orderBy('updated_at', 'desc')
             ->get();



    return Inertia::render('Dashboard', ['tasks' => $tasks]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/task', [TaskController::class, 'add_task'])->name('task.add_task');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::post('/task', [TaskController::class, 'update'])->name('task.update');
    Route::post('/task', [TaskController::class, 'delete'])->name('task.delete');


});


require __DIR__ . '/auth.php';
