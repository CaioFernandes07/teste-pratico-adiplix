<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $people = Person::factory(50)->create();
        $task   = Task::factory(50)->create();

        $people->each(function (Person $person) use ($task){
            $ramdomTasks = $task->random(rand(1, 5));
            $person->tasks()->attach($ramdomTasks);
        });
    }
}
