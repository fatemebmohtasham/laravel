<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->sentence(3),
            'description'=>fake()->text(),
            'startTime'=>fake()->dateTimeBetween('now','+1 month'),
            'endTime'=>fake()->dateTimeBetween('+1 month','+2 months'),
            'created_at'=>fake()->dateTimeBetween('-1years'),
            'updated_at'=>function(array $attributes){
                return fake()->dateTimeBetween($attributes['created_at'], 'now');
            }
        ];
    }
}
