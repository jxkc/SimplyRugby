<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_profiles', function (Blueprint $table) {
            $table->id('sru_number'); // Define sru_number as the primary key
            $table->unsignedBigInteger('skillid')->nullable();
            $table->string('squad')->nullable()->default('');
            $table->text('comment')->nullable()->default('');
            $table->text('medical_note')->nullable()->default('');
            $table->timestamps();
            $table->foreign('sru_number')->references('sru_number')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_profiles');
    }
}
