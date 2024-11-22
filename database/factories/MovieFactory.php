<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title'=>fake()->text(25),
                'poster'=>fake()->imageUrl(),
                'intro'=>fake()->text(25),
                'release_date'=>fake()->date(),
                'genre_id'=>rand(1, 2),
        ];
    }
}
