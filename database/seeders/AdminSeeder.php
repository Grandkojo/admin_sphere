<?php

namespace Database\Seeders;

use App\Models\User;
use App\Classes\UserClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => '3',
            'gender' => 'M',
            'user_id' => (new UserClass())->generateUniqueId(),
            'department_id' => 2,
        ]);
    }
}
