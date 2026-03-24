<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run()
{
    $students = \App\Models\Student::factory(5)->create();  // Create 5 students
    $courses = \App\Models\Course::factory(3)->create();   // Create 3 courses

    foreach ($students as $student) {
        $student->courses()->attach( // Attach random courses to each student
            $courses->random(2)->pluck('id')->toArray() // Attach 2 random courses
        );
    }
}

}
