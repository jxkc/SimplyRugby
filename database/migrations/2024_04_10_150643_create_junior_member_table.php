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
        Schema::create('junior_members', function (Blueprint $table) {
            $table->id('sru_number'); // This line defines sru_number as the primary key
            $table->foreign('sru_number')->references('sru_number')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('junior_member');
    }
};
