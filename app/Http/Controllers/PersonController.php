<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * View a list of people.
     */
    public function index(): JsonResponse
    {
        $people = Person::all();
        return response()->json($people);
    }

    /**
     * Create a new person and store in the database
     */
    public function store(PersonRequest $request): JsonResponse
    {
        $person = Person::create($request->validated());
        return response()->json($person, 201);
    }

    /**
     * Show a specific person.
     */
    public function show(Person $person): JsonResponse
    {
        return response()->json($person);
    }

    /**
     * Update a specific person in the database.
     */
    public function update(PersonRequest $request, Person $person): JsonResponse
    {
        $person->update($request->validated());
        return response()->json($person);
    }

    /**
     * Remove a specific person from the database.
     */
    public function destroy(Person $person): JsonResponse
    {
        $person->delete();
        return response()->json(null, 204);
    }

    /**
     * Get all tasks for a person.
     */
    public function tasks(Person $person): JsonResponse
    {
        return response()->json($person->tasks);
    }

    /**
     * Assign tasks to a person.
     */
    public function assignTasks(Request $request, Person $person): JsonResponse
    {
        $validated = $request->validate([
            'tasks' => ['required', 'array'],
            'tasks.*' => ['required', 'exists:tasks,id']
        ]);

        $person->tasks()->attach($validated['tasks']);
        return response()->json(['message' => 'Tarefas atribuídas com sucesso']);
    }

    /**
     * Remove tasks from a person.
     */
    public function removeTasks(Request $request, Person $person): JsonResponse
    {
        $validated = $request->validate([
            'tasks' => ['required', 'array'],
            'tasks.*' => ['required', 'exists:tasks,id']
        ]);

        $person->tasks()->detach($validated['tasks']);
        return response()->json(['message' => 'Tarefas removidas com sucesso']);
    }
}
