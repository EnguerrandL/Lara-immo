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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('isAvailable')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('adress');
            $table->longText('description');
            $table->string('slug')->nullable();
            $table->string('city');
            $table->integer('zipcode');
            $table->integer('size');
            $table->integer('price');
            $table->integer('room');
            $table->integer('floor');
            $table->integer('part');
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
