<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $filteredCategories = ['smartproduct', 'household', 'gaming'];
        $filteredTypes = ['smartproduct', 'household', 'gaming'];

        return [
            "name" => fake()->words(3, true),
            "type" => fake()->randomElement($filteredTypes),
            "price" => fake()->randomFloat(2,10,10000),
            "category" => fake()->randomElement($filteredCategories),
            "description" => fake()->sentence(),
            "image" => "placeholder.png",
            "quantity" => fake()->numberBetween(1,1000),
        ];
    }
}
