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
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_1_id')->nullable();
            $table->foreignId('team_2_id')->nullable();
            $table->foreignId('won_team_id')->nullable();
            $table->integer('team_1_score')->nullable();
            $table->integer('team_2_score')->nullable();
            $table->integer('team_1_wicket')->nullable();
            $table->integer('team_2_wicket')->nullable();
            $table->integer('team_1_over')->nullable();
            $table->integer('team_2_over')->nullable();
            $table->enum('won_by', ['1', '2'])->comment('1 => Run, 2 => Wicket')->nullable();
            $table->integer('won_by_no')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_results');
    }
};