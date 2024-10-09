<?php

namespace Database\Factories;

use App\Models\Vehicle; // Ensure you import the Vehicle model
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'owner_id' => \App\Models\User::factory()->create()->id, // Create a user for the owner_id
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'type' => $this->faker->word,
            'price_per_day' => $this->faker->randomFloat(2, 10, 500), // Random price between 10 and 500
            'fuel_type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['available', 'rented', 'maintenance']),
        ];
    }
}
