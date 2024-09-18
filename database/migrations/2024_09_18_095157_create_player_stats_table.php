<?php

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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->nullable();
            $table->string('matches')->nullable();
            $table->string('innings')->nullable();
            $table->string('runs')->nullable();
            $table->string('strike_rate')->nullable();
            $table->string('highest_runs')->nullable();
            $table->string('catches')->nullable();
            $table->string('overs')->nullable();
            $table->string('wickets')->nullable();
            $table->string('fours')->nullable();
            $table->string('sixes')->nullable();
            $table->string('fifties')->nullable();
            $table->string('hundreds')->nullable();
            $table->string('average')->nullable();
            $table->string('economy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
