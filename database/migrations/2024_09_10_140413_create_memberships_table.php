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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->nullable();
            $table->string('player_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('player_type')->nullable();
            $table->string('jersey_name')->nullable();
            $table->string('jersey_size')->nullable();
            $table->string('jersey_number')->nullable();
            $table->string('payment_screenshot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
