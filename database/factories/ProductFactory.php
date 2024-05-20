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
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'image' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(0, 100),
            'categorie_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
