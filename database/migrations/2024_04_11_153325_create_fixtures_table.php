<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id('fixtureid');
            $table->string('opposition_name');
            $table->date('dom'); // Date of match
            $table->string('location');
            $table->time('kick_off'); // Time of kick off
            $table->string('result')->nullable(); // Result of the match
            $table->string('score')->nullable(); // Score of teams (e.g., 36/23)
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
        Schema::dropIfExists('fixtures');
    }
}
