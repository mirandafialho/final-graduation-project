<?php

namespace Database\Factories;

use App\Models\ServiceLevelAgreement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCatalogueFactory extends Factory
{
    public function definition()
    {
        return [
            'service_level_agreement_id' => ServiceLevelAgreement::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(2)
        ];
    }
}
