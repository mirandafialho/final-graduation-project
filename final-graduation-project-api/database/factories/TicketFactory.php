<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        $dateTicket = $this->faker->dateTimeBetween('-1 week', '+1 week');

        return [
            'ticket' => '#' . $this->faker->year . $this->faker->randomNumber(3),
            'client_id' => User::factory(),
            'user_id' => User::factory(),
            'service_catalogues_id' => ServiceCatalog::factory(),
            'department_id' => Department::factory(),
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement(['open', 'working', 'closed']),
            'date_start' => $dateTicket,
            'date_end' => $dateTicket->add(new \DateInterval('P2D')),
            'date_finished' => $this->faker->randomElement([
                $dateTicket,
                $dateTicket->add(new \DateInterval('P1D')),
                $dateTicket->add(new \DateInterval('P2D')),
                null
            ]),
        ];
    }
}
