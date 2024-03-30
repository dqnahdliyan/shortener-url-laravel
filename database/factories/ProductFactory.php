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
            'name' => $name = fake()->sentence(),
            'slug' => str($name.'-'.str()->random(5))->slug(),
            'description' => fake()->sentence(30),
            'price' => rand(1000, 100000),
        ];
    }
}
