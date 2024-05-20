<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1, 10),
            'status' => 'pending',
            'total' => $this->faker->randomFloat(2, 0, 100),
            'address' => $this->faker->address(),
        ];
    }
}