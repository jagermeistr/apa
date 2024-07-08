<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FarmerDetails;
use App\Models\User;
use App\Models\PluckerDetails;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FarmerDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     public function definition(): array
     {
         return [
             
             'weight_collected' => abs(fake()->numberBetween(1, 1000)) . ' kg',
 
 
             //
         ];
     }
     public function configure(): static
     {
         return $this->afterMaking(function (FarmerDetails $farmerDetails) {
             $farmer = User::whereRole('agent')->pluck('name'); // fetch agents name from database
             $farmerDetails->name = $farmer->random();
         });
        return $this->afterMaking(function (PluckerDetails $pluckerDetails) {
            $agent = $pluckerDetails->user; // assuming PluckerDetails belongs to user
            $farm = $agent->farm; // assuming Agent has a farm relationship
            $pluckerDetails->name = $farm->name;
        });
        return $this->afterMaking(function (FarmerDetails $farmerDetails) {
            $agent = User::whereRole('agent')->inRandomOrder()->first(); // get a random agent
            $farmerDetails->phone_number = $agent->phone_number; // assign the agent's phone number
        });
        }
}

