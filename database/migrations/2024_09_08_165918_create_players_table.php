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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('sr_no')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('history')->nullable();
            $table->enum('type', ['1', '2', '3'])->comment('1 => Captain, 2 => Vice Captain, 3 => Player')->nullable();
            $table->string('player_type')->nullable();
            $table->string('status_in_cambodia')->nullable();
            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('jersey_name')->nullable();
            $table->string('jersey_size')->nullable();
            $table->string('jersey_number')->nullable();
            $table->string('payment_screenshot')->nullable();
            $table->enum('is_highlight', ['Y', 'N'])->default('N')->nullable();
            $table->enum('active', ['Y', 'N'])->default('Y')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
