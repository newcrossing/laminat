<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => fake()->company(),
            'text' => fake()->text(),
            'price' => fake()->randomNumber(4),
            'square' => fake()->randomNumber(2),
            'public' => fake()->boolean(),
            'article' => fake()->text(6),
            'slug' => Str::random(200),

        ];
    }
}
