<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceLevelAgreementFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(2),
            'response_time' => $this->faker->randomNumber(2, false),
            'resolution_time' => $this->faker->randomNumber(3, false),
            'available' => $this->faker->randomElement(['24x7', '8x5']),
            'priority' => $this->faker->randomElement(['critical', 'urgent', 'normal']),
        ];
    }
}
