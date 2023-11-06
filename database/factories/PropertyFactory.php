<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isAvailable' => fake()->boolean($chanceOfGettingTrue = 70),
            'title' => fake()->name(),
            'description' => fake()->text(100),
            'adress' => fake()->streetAddress(),
            'slug' => fake()->slug(),
            'city' => fake()->city(),
            'size' => fake()->numberBetween('20', '200'),
            'price' => fake()->numberBetween('130000', '900000'),
            'zipcode' => fake()->postcode(),
            'room' => fake()->numberBetween('1', '5'),
            'part' => fake()->numberBetween('2', '5'),
            'floor' => fake()->numberBetween('1', '3'),



        ];
    }
}
