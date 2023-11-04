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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });


        Schema::create('option_property', function(Blueprint $table){
            $table->foreignIdFor(\App\Models\Property::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Option::class)->constrained()->cascadeOnDelete();
            $table->primary(['property_id', 'option_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
        Schema::dropIfExists('property_option');
    }
};
