<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([

            //engineering programs
            ['program_code' => 'CIE', 'program_name' => 'Civil Engineering', 'program_description' => 'Civil Engineering discipline', 'department_id' => 1],
            
            ['program_code' => 'ME', 'program_name' => 'Mechanical Engineering', 'program_description' => 'Mechanical Engineering discipline', 'department_id' => 1],

            ['program_code' => 'EE', 'program_name' => 'Electrical Engineering', 'program_description' => 'Electrical Engineering discipline', 'department_id' => 2],

            ['program_code' => 'CE', 'program_name' => 'Computer Engineering', 'program_description' => 'Computer Engineering discipline', 'department_id' => 2],

            ['program_code' => 'CHE', 'program_name' => 'Chemical Engineering', 'program_description' => 'Chemical Engineering discipline', 'department_id' => 3],

            //science programs
            ['program_code' => 'CSC', 'program_name' => 'Computer Science', 'program_description' => 'Computer Science discipline', 'department_id' => 4],

            ['program_code' => 'CS', 'program_name' => 'Cyber Security', 'program_description' => 'Cyber Security discipline', 'department_id' => 4],

            ['program_code' => 'IT', 'program_name' => 'Information Technology', 'program_description' => 'Information Technology discipline', 'department_id' => 5],

            ['program_code' => 'IS', 'program_name' => 'Information Systems', 'program_description' => 'Information Systems discipline', 'department_id' => 5],

            //business programs
            ['program_code' => 'BAM', 'program_name' => 'Business Administration', 'program_description' => 'Business Administration discipline', 'department_id' => 6],

            ['program_code' => 'ENT', 'program_name' => 'Entrepreneurship', 'program_description' => 'Entrepreneurship discipline', 'department_id' => 6],

            ['program_code' => 'MGT', 'program_name' => 'Management', 'program_description' => 'Management discipline', 'department_id' => 6],

            ['program_code' => 'MKT', 'program_name' => 'Marketing', 'program_description' => 'Marketing discipline', 'department_id' => 6],

            
        ]);
    }
}
