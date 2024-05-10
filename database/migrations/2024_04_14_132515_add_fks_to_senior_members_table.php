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
        Schema::table('senior_members', function (Blueprint $table) {
            $table->unsignedBigInteger('doctorid');
            $table->unsignedBigInteger('kinid');
            $table->string('position');

            $table->foreign('kinid')->references('kinid')->on('next_of_kin');
            $table->foreign('doctorid')->references('doctorid')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senior_members', function (Blueprint $table) {
            $table->dropForeign(['kinid']);
            $table->dropColumn('kinid');
        });
    }
};
