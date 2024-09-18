<?php

namespace Database\Factories;

use App\Models\Musician;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Musician::inRandomOrder()->first()  -> musician  object  -> id
        // Musician::inRandomOrder()->first()   null -> id
        return [
            'title' => fake()->sentence(),
            'cpr_date' => fake()->date('Y-m-d',Carbon::now()),
            'musician_id' => Musician::inRandomOrder()->first()?->id ?? Musician::factory()->create()->id
        ];
    }
}
