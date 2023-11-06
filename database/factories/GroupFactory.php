<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_name' => fake()->sentence,
            'group_time' => fake()->sentence,
            'group_date' => fake()->date,
            'group_type' => fake()->sentence,
            'group_image'=> fake()->imageUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
