<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id('skillid');
            $table->string('passing_standard')->nullable();
            $table->string('passing_spin')->nullable();
            $table->string('passing_pop')->nullable();
            $table->string('tackling_front_rear')->nullable();
            $table->string('tackling_rear_side')->nullable();
            $table->string('tackling_side')->nullable();
            $table->string('tackling_scrabble')->nullable();
            $table->string('kicking_drop_punt')->nullable();
            $table->string('kicking_drop_grubber')->nullable();
            $table->string('kicking_drop_goal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
