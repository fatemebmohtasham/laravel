<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title,
            'description' => fake()->sentence,
            'longDescription' => fake()->paragraph,
            'created_at'=>fake()->date,
            'updated_at'=>fake()->date,
            'status'=>fake()->randomElement(['completed','non-completed'])
        ];
    }
}
