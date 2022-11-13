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
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'cover' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->paragraph,
            'stock' => $this->faker->randomNumber(2),
        ];
    }
}