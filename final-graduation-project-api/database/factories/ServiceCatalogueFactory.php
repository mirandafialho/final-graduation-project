<?php

namespace Database\Factories;

use App\Models\ServiceLevelAgreement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCatalogueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_level_agreement_id' => ServiceLevelAgreement::factory(),
            'name'                       => fake()->word,
            'description'                => fake()->paragraph(2)
        ];
    }
}
