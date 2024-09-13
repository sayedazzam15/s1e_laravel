<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musician>
 */
class MusicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->userName(),
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            'phone' => fake()->phoneNumber() ,
            'gender' => fake()->randomElement(['male','female']),
            'top_producer' => 0
        ];
    }
}
