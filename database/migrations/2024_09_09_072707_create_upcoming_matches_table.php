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
        Schema::create('upcoming_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_1_id')->nullable();
            $table->foreignId('team_2_id')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_matches');
    }
};
