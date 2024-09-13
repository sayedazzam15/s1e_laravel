<?php

namespace Database\Seeders;

use App\Models\Musician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Musician::factory()->count(100)->create();
    }
}
