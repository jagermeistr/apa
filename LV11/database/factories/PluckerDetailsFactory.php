<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PluckerDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'farm' => fake()->firstName. 'farm',
            'phone' => '+254' . fake()->numerify('7########'), 
            'weight collected' => abs(fake()->numberBetween(1, 1000)) . ' kg',


            //
        ];
    }
}
