<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index')->middleware('auth');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update')->middleware('auth');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
