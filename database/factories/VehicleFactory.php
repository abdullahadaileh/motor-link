<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleType; // Import VehicleType model
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        $makes = [
            'Toyota', 'Honda', 'Nissan', 'Ford', 'Chevrolet', 'Hyundai',
            'Kia', 'Mazda', 'Subaru', 'Volkswagen', 'Mercedes-Benz',
            'BMW', 'Audi', 'Lexus', 'Porsche', 'Mitsubishi', 'Peugeot',
            'Renault', 'Fiat', 'Land Rover'
        ];

        return [
            'owner_id' => \App\Models\User::factory()->create()->id,
            'make' => $this->faker->randomElement($makes),
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(1980, date('Y')),
            'type_id' => VehicleType::all()->random()->id, 
            'price_per_day' => $this->faker->randomFloat(2, 10, 500),
            'fuel_type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['available']),
        ];
    }
}
