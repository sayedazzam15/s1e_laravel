<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->userName(),
            'album_id' => Album::inRandomOrder()->first()->id
        ];
    }
}
