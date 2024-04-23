<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
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
            'prenom' => fake()->firstName(),
            'nom' => fake()->lastName(),
            'cin' => fake()->unique()->randomNumber(8),
            'email' => fake()->email(),
            'password' => bcrypt('password123'),
            'telephone' => fake()->phoneNumber(),
            'role' => fake()->randomElement(['Employé', 'Administrateur']),
            'domaine' => fake()->name(),
            'post' => fake()->name(),
        ];
    }
}
