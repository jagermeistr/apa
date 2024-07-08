<?php

namespace Database\Factories;
use App\Models\PluckerDetails;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;



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
            
            'farm' => fake()->firstName . 'farm',
            'phone' => '+254' . fake()->numerify('7########'),
            'weight_collected' => abs(fake()->numberBetween(1, 1000)) . ' kg',
            'role' => 'user', // default role


            //
        ];
    }
    public function configure(): static
    {
        return $this->afterMaking(function (PluckerDetails $pluckerDetails) {
            $pluckers = User::whereRole('user')->pluck('name'); // fetch pluckers from database
            $pluckerDetails->name = $pluckers->random();
        });
   }
}