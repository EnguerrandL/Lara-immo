<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Property::factory(10)->create();
        Option::factory(10)->create();

        // for ($i = 1; $i <= 50; $i++) {
        //     $property_id = rand(1, 10); // Remplacez 10 par le nombre total de propriétés
        //     $option_id = rand(1, 10); // Remplacez 10 par le nombre total d'options

        //     DB::table('property_option')->insert([
        //         'property_id' => $property_id,
        //         'option_id' => $option_id,
        //     ]);
        // }
        
        // Image::factory(10)->create();
    }
}
