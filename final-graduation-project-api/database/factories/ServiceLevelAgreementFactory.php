<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceLevelAgreementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'            => fake()->name,
            'description'     => fake()->paragraph(2),
            'response_time'   => fake()->randomNumber(2, false),
            'resolution_time' => fake()->randomNumber(3, false),
            'available'       => fake()->randomElement(['24x7', '8x5']),
            'priority'        => fake()->randomElement(['critical', 'urgent', 'normal']),
        ];
    }
}
