<?php

namespace Database\Seeders;

use App\Models\User; // Add this line to import the User model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("password"),
        ]);
    }
}
