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
        Schema::create('station_has_certification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('STATION_ID')->references('id')->on('stations');
            $table->foreignId('CERTIFICATION_ID')->references('id')->on('certifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_has_certification');
    }
};
