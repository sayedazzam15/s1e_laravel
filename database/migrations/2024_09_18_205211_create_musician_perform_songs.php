<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Musician;
use App\Models\Song;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musician_perform_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Musician::class);
            $table->foreignIdFor(Song::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musician_perform_songs');
    }
};
