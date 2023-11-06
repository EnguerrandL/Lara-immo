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
    
   

        DB::table('options')->insert([
            ['name' => 'Piscine'],
            ['name' => 'Jardin'],
            ['name' => 'Cuisine equipée'],
            ['name' => 'Balcon'],
            ['name' => 'Climatisation'],
            ['name' => 'Garage'],
            ['name' => 'Fibre optique'],
        
        ]);


        $options = Option::all();

        Property::factory(10)->create()->each(function ($property) use ($options) {
            $randomOptions = $options->random(rand(1, $options->count()));
            $property->options()->attach($randomOptions);
        });


        Image::factory(50)->create();


    }
}
