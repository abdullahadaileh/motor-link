<?php

namespace Database\Factories;

use App\Models\Vehicle; 
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

        $types = [
            'Economical car', 'Jeep car', 'Luxury car', 'Pickup Truck', 
            'Sport car', 'SUV', 'Hatchback', 'Sedan', 'Minivan', 
            'Crossover', 'Coupe', 'Convertible', 'Station Wagon', 
            'Electric car', 'Hybrid car'
        ];

        return [
            'owner_id' => \App\Models\User::factory()->create()->id, 
            'make' => $this->faker->randomElement($makes), 
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(1980, date('Y')), 
            'type' => $this->faker->randomElement($types), 
            'price_per_day' => $this->faker->randomFloat(2, 10, 500), 
            'fuel_type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['available', 'rented', 'maintenance']),
        ];
    }
}
