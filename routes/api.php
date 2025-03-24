<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TaskController;

// Rotas para pessoas
Route::apiResource('people', PersonController::class);
Route::get('people/{person}/tasks', [PersonController::class, 'tasks']);
Route::post('people/{person}/tasks', [PersonController::class, 'assignTasks']);
Route::delete('people/{person}/tasks', [PersonController::class, 'removeTasks']);

// Rotas para tarefas
Route::apiResource('tasks', TaskController::class);
Route::get('tasks/{task}/people', [TaskController::class, 'people']);