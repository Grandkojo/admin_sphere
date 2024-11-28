<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colleges')->insert([

            //engineering college
            ['college_code' => 'COE', 'college_name' => 'College of Engineering', 'college_description' => 'Engineering disciplines'],

            //science college
            ['college_code' => 'COS', 'college_name' => 'College of Science', 'college_description' => 'Science disciplines'],

            //business college
            ['college_code' => 'COB', 'college_name' => 'College of Business', 'college_description' => 'Business and Entrepreneurship disciplines']
        ]);
    }
}
