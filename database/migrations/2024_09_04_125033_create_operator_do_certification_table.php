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
        Schema::create('operator_has_certification', function (Blueprint $table) {
            $table->foreignId('OPERATOR_ID')->references('id')->on('operators');
            $table->foreignId('CERTIFICATION_ID')->references('id')->on('station_has_certification');
            $table->boolean('PENDING')->default(1);
            $table->string('CERTIFICATE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_does_certification');
    }
};
