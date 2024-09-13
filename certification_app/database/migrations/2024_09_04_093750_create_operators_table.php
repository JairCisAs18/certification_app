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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('CREATED_BY')->references('id')->on('users');
            $table->foreignId('AREA_ID')->references('id')->on('areas');
            $table->bigInteger('EMPLOYEE_ID')->unique();
            $table->string('NAME', 100);
            $table->integer('AGE');
            $table->string('BIRTHDATE', 15);
            $table->string('CATEGORY', 3);
            $table->string('PHOTO', 100)->nullable();
            $table->boolean('IsActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
