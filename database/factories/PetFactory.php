<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal_type_id' => 1,
            'name' => fake()->firstName,
            'breed' => fake()->randomElement(['Beagle', 'Bulldog', 'Pastor alemán', 'null']),
            'age' => random_int(1, 80),
            'gender' => fake()->randomElement(['male', 'female']),
            'size' => fake()->randomElement([ 'small', 'medium', 'large']),
            'color' => fake()->colorName()
        ];
    }
}
