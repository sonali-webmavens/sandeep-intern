<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=> fake()->text(min(5,30)),
            'email'=> fake()->unique()->safeEmail(),
            'last_name' => fake()->text(min(5,30)),
            'phone' =>'my image is loding' ,
            'companies_id'=> 'companies_id',
        ];
    }
}
