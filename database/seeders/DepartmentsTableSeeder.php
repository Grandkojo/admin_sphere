<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([

            //engineering departments
            ['department_code' => 'CE', 'department_name' => 'Civil and Mechanical Engineering', 'department_description' => 'Civil Engineering discipline', 'college_id' => 1],

            ['department_code' => 'EE', 'department_name' => 'Electrical and Computer Engineering', 'department_description' => 'Electrical Engineering discipline', 'college_id' => 1],

            ['department_code' => 'CHE', 'department_name' => 'Chemical Engineering', 'department_description' => 'Chemical Engineering discipline', 'college_id' => 1],


            //science departments
            ['department_code' => 'CSC', 'department_name' => 'Computer Sciences', 'department_description' => 'Computer Science discipline', 'college_id' => 2],

            ['department_code' => 'IT', 'department_name' => 'Information Technology', 'department_description' => 'Information Technology discipline', 'college_id' => 2],


            //business departments
            ['department_code' => 'BAM', 'department_name' => 'Business and Administration', 'department_description' => 'Business Administration discipline', 'college_id' => 3],



        ]);
    }
}
