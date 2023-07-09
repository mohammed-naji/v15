<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->text(100),
            'user_id' => fake()->numberBetween(1, 10),
            'post_id' => fake()->numberBetween(1, 20),
            'replay_to' => fake()->randomElement([NULL, rand(1, 50)])
        ];
    }
}
