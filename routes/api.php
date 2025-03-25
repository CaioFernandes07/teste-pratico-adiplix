<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TaskController;


// Rotas para pessoas
/**
 * @apiResource people
 * @apiDescription  API resource para gerenciar pessoas. Fornece operações CRUD.
 */
Route::apiResource('people', PersonController::class);

/**
 * @api {get} /people/{person}/tasks Obter todas as tarefas atribuídas a uma pessoa
 * @apiName GetPersonTasks
 * @apiGroup Pessoas
 *
 * @apiParam {int} person ID único da pessoa.
 *
 * @apiSuccess {Object[]} tasks Lista de tarefas atribuídas à pessoa.
 */
Route::get('people/{person}/tasks', [PersonController::class, 'tasks']);

/**
 * @api {post} /people/{person}/tasks Atribuir tarefas a uma pessoa
 * @apiName AssignTasksToPerson
 * @apiGroup Pessoas
 *
 * @apiParam {int} person ID único da pessoa.
 * @apiParam {int[]} tasks Array de IDs de tarefas a serem atribuídas.
 *
 * @apiSuccess {String} message Mensagem de sucesso.
 */
Route::post('people/{person}/tasks', [PersonController::class, 'assignTasks']);

/**
 * @api {delete} /people/{person}/tasks Remover tarefas de uma pessoa
 * @apiName RemoveTasksFromPerson
 * @apiGroup Pessoas
 *
 * @apiParam {int} person ID único da pessoa.
 * @apiParam {int[]} tasks Array de IDs de tarefas a serem removidas.
 *
 * @apiSuccess {String} message Mensagem de sucesso.
 */
Route::delete('people/{person}/tasks', [PersonController::class, 'removeTasks']);

// Rotas para tarefas
/**
 * @apiResource tasks
 * @apiDescription API resource para gerenciar tarefas. Fornece operações CRUD.
 */
Route::apiResource('tasks', TaskController::class);

/**
 * @api {get} /tasks/{task}/people Obter todas as pessoas atribuídas a uma tarefa
 * @apiName GetTaskPeople
 * @apiGroup Tarefas
 *
 * @apiParam {int} task ID único da tarefa.
 *
 * @apiSuccess {Object[]} people Lista de pessoas atribuídas à tarefa.
 */
Route::get('tasks/{task}/people', [TaskController::class, 'people']);