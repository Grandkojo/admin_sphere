<?php

namespace Database\Seeders;

use App\Models\User;
use App\Classes\UserClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'last_name' => 'Essien',
            'other_names' => 'Ernest Kojo',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('testuser'),
            'role' => '1',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'program_id' => '4',
        ]);

        User::create([
            'last_name' => 'Gyampo',
            'other_names' => 'Kofi Annan',
            'email' => 'kannan@gmail.com',
            'password' => bcrypt('kannan24'),
            'role' => '1',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'program_id' => '2',
        ]);

        User::create([
            'last_name' => 'Logah',
            'other_names' => 'Barbara Omaira',
            'email' => 'lbabs@gmail.com',
            'password' => bcrypt('lbabs22'),
            'role' => '1',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'type' => 'fee_paying',
            'program_id' => '3',
        ]);
    }
}
