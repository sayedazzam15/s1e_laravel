<?php

use App\Models\Musician;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title')->uniqid();
            $table->date('cpr_date');
            // create foreign key column
            // first approach (single line)
            // $table->foreignId('musician_id')->constrained('musician');
            // second approach  (two lines)
            // $table->foreignId('musician_id');
            // $table->foreign('musician_id')->references('id')->on('musician');
            // third approach
            $table->foreignIdFor(Musician::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
