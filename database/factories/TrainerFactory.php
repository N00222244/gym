<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->sentence,
            'last_name' => fake()->sentence,
            'age' => fake()->sentence,
            'trainer_image' => fake()->imageUrl,
            'created_at' => now(),
            'updated_at' =>now(),
        ];
    }
}
