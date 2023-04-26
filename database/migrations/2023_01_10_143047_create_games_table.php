<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('game_type');
            $table->unsignedInteger('total_time')->default(0);
            $table->foreignId('current_team_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('current_playing_team_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('next_team_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->foreignId('current_round_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('next_round_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->boolean('auto_next_round')->default(false);
            $table->boolean('clockwise')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
