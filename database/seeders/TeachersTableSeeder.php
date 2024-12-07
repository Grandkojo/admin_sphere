<?php

namespace Database\Seeders;

use App\Models\User;
use App\Classes\UserClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'last_name' => 'Kwakye',
            'other_names' => 'Prince Kojo',
            'email' => 'kwaprince@gmail.com',
            'password' => bcrypt('kwaprince'),
            'role' => '2',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'course_code' => 'CIE 101',
        ]);


        User::create([
            'last_name' => 'Teshie',
            'other_names' => 'Kofi Praku',
            'email' => 'tkofiprak@gmail.com',
            'password' => bcrypt('tkofiprak'),
            'role' => '2',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'course_code' => 'ME 109',
        ]);

        User::create([
            'last_name' => 'Frimpong',
            'other_names' => 'Grace Ama',
            'email' => 'frgracama@gmail.com',
            'password' => bcrypt('frgracame'),
            'role' => '2',
            'gender' => 'F',
            'user_id' => (new UserClass())->generateUniqueId(),
            'course_code' => 'CE 303',
        ]);
    }
}
