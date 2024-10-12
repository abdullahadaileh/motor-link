<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleType;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle_types = [
            [
                'name' => 'Economical car',
                'description' => 'An economical car that is fuel-efficient and cost-effective.'
            ],
            [
                'name' => 'Luxury car',
                'description' => 'A high-end luxury vehicle with premium features.'
            ],
            [
                'name' => 'Pickup Truck',
                'description' => 'A versatile pickup truck suitable for heavy loads.'
            ],
            [
                'name' => 'Sport car',
                'description' => 'A fast and high-performance sport car.'
            ],
            [
                'name' => 'SUV',
                'description' => 'A spacious and powerful SUV for all terrains.'
            ],
            [
                'name' => 'Hatchback',
                'description' => 'A compact hatchback car with a rear door that swings upward.'
            ],
            [
                'name' => 'Sedan',
                'description' => 'A comfortable and stylish sedan with ample seating.'
            ],
            [
                'name' => 'Electric car',
                'description' => 'An eco-friendly electric car with zero emissions.'
            ],
            [
                'name' => 'Hybrid car',
                'description' => 'A hybrid car with both an electric motor and a traditional engine.'
            ],
        ];

        foreach ($vehicle_types as $vehicle_type) {
            VehicleType::create([
                'name' => $vehicle_type['name'],
                'description' => $vehicle_type['description']
            ]);
        }
    }
}
