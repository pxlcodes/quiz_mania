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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('icon')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->unsignedInteger('timeout')->default(0); // zero means no timeout for this category (in second)
            $table->unsignedInteger('multiplier')->default(2); // multiplier for the points
            $table->unsignedInteger('multiplier_to_next_team')->default(1); // multiplier for the points
            $table->unsignedInteger('negative_marking_multiplier')->default(0); // order of the category
            $table->unsignedInteger('negative_marking_multiplier_to_next_team')->default(0); // order of the category
            $table->boolean('can_pass_to_next_team')->default(false); // can pass to next team
            $table->boolean('auto_next_team')->default(false); // auto next team after timeout
            $table->boolean('auto_next_question')->default(false); // auto next question after timeout
            $table->boolean('has_media')->default(false); // category has media
            $table->boolean('has_multi_choice')->default(false); // category has multiple choice
            $table->unsignedInteger('multi_choice_count')->default(0); // number of multiple choice
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
        Schema::dropIfExists('categories');
    }
};
