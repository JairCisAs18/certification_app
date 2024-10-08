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
        Schema::create('videos', function (Blueprint $table) {
            $table->foreignId('CERTIFICATION_ID')->references('id')->on('station_has_certification');
            $table->string('VIDEO');  
        });

        Schema::create('files', function (Blueprint $table) {
            $table->foreignId('CERTIFICATION_ID')->references('id')->on('station_has_certification');
            $table->string('FILE_NAME');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
        Schema::dropIfExists('files');
    }
};
