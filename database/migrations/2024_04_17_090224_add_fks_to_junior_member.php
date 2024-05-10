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
        Schema::table('junior_members', function (Blueprint $table) {
            $table->unsignedBigInteger('doctorid')->default(1);
            $table->unsignedBigInteger('guardianid_1')->default(1);
            $table->unsignedBigInteger('guardianid_2')->default(2);
            
            $table->string('position')->default('Unknown');

            $table->foreign('doctorid')->references('doctorid')->on('doctors')->onDelete('cascade');
            $table->foreign('guardianid_1')->references('guardianid')->on('guardians')->onDelete('cascade');
            $table->foreign('guardianid_2')->references('guardianid')->on('guardians')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('junior_member', function (Blueprint $table) {
            //
        });
    }
};
