<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'heure_started' => $this->faker->time('H:i:s', '08:00:00'),
            'heure_end' => $this->faker->time('H:i:s', '17:00:00'),
            'type_panne' => $this->faker->randomElement(['Souci Ligne Standar Jeux (0530 330 330) + Lignes Sortant']),
            //'status' => $this->faker->randomElement(['En investigation', 'Réalisé']),
            'obsevation' => $this->faker->sentence(),
            'inpact' => $this->faker->randomElement(['STANDARD JEUX', 'INTERNET']),
            'action' => $this->faker->sentence(),
            'entity_id' => Entity::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
