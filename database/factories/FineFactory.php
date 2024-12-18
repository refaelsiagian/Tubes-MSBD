<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fine>
 */
class FineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fine_name' => $this->faker->word,
            'fine_price' => $this->faker->numberBetween(5000, 50000),
        ];
    }
}
