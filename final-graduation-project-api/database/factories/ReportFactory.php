<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ticket_id'   => Ticket::factory(),
            'user_id'     => User::factory(),
            'title'       => fake()->sentence,
            'description' => fake()->paragraph(2),
        ];
    }
}
