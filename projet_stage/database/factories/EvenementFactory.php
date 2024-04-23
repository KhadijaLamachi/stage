<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'titre' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'date_debut' => fake()->dateTime(),
            'date_fin' => fake()->dateTime(),
            'domaines_cibles' => fake()->randomElement(['degitalisation', 'economie','cecurity']),
            'posts_cibles' => fake()->randomElement(['ingenieur', 'technicien','responsable']),

            // 'capacite' => fake()->numberBetween(30,300),
        ];
    }
}
