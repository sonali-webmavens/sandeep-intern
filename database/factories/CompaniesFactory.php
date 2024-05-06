<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
 */
class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name'=> fake()->name(),
            'email'=> fake()->unique()->safeEmail(),
            'website' => fake()->text(min(5,30)),
            'logo' =>'my image is loding' ,
        ];
    }
}
