<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "image" => FakerPicsumImagesProvider::imageUrl(),
            "name" => fake()->word(),
            "description" => fake()->text(),
            "price" => fake()->randomFloat(2, max: 999999),
        ];
    }
}
