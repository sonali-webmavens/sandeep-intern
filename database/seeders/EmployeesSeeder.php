<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $companyId = Companies::inRandomOrder()->first()->id;
            Employees::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('#########'),
                'companies_id' => $companyId,
            ]);
        }
    }
}
