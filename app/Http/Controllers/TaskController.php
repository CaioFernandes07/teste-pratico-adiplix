<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * View a task listing.
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a task in storage.
     */
    public function store(TaskRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());
        return response()->json($task, 201);
    }

    /**
     * View the specified task.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json($task);
    }

    /**
     * Update the specified task in storage.
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());
        return response()->json($task);
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return response()->json(null, 204);
    }

    /**
     * Get all people assigned to a task.
     */
    public function people(Task $task): JsonResponse
    {
        return response()->json($task->people);
    }
}
