<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            StudentsTableSeeder::class,
            AdminSeeder::class,
            CollegesTableSeeder::class,
            DepartmentsTableSeeder::class,
            ProgramsTableSeeder::class,
            CoursesTableSeeder::class,
        ]);
    }
}
