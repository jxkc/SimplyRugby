<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('training_sessions', function (Blueprint $table) {
        //     $table->id('trainingsessionid');
        //     $table->foreignId('sru_number')->constrained('members', 'sru_number')->onDelete('cascade');
        //     $table->foreignId('coach_id')->constrained('coaches', 'coachid')->onDelete('cascade');
        //     $table->date('dos'); // Date of session
        //     $table->string('location');
        //     $table->time('time');
        //     $table->text('session_note')->nullable();
        //     $table->text('medical_report')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('session_player_profile', function (Blueprint $table) {
        //     $table->foreignId('session_id')->constrained('training_sessions', 'trainingsessionid')->onDelete('cascade');
        //     $table->foreignId('player_profile_id')->constrained('player_profiles', 'playerprofileid')->onDelete('cascade');
        //     $table->primary(['session_id', 'player_profile_id']);
        // });
        
        // Schema::create('session_coach', function (Blueprint $table) {
        //     $table->foreignId('session_id')->constrained('training_sessions', 'trainingsessionid')->onDelete('cascade');
        //     $table->foreignId('coach_id')->constrained('coaches', 'coachid')->onDelete('cascade');
        //     $table->primary(['session_id', 'coach_id']);
        // });

        Schema::create('training_sessions', function (Blueprint $table) {
            $table->id('trainingsessionid');
            $table->date('dos'); // Date of session
            $table->string('location');
            $table->time('time');
            $table->text('session_note')->nullable();
            $table->text('medical_report')->nullable();
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
        Schema::dropIfExists('training_sessions');
    }
};
