<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {



        return [
            'images' => fake()->imageUrl(640, 480),
            'property_id' => fake()->numberBetween('1', '10')
        ];
    }




    public function configure()
    {
        return $this->afterCreating(function (Image $image) {
            $property = $image->property;
            $imageCount = $property->images->count();

            // Si le nombre d'images dépasse 3, supprimez les images supplémentaires
            if ($imageCount > 3) {
                $imagesToDelete = $property->images->slice(3);
                foreach ($imagesToDelete as $imageToDelete) {
                    $imageToDelete->delete();
                }
            }
        });
    }
}
