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
            'Economical car',
            'Jeep car',
            'Luxury car',
            'Pickup Truck',
            'Sport car',
            'SUV',
            'Hatchback',
            'Sedan',
            'Minivan',
            'Crossover',
            'Coupe',
            'Convertible',
            'Station Wagon',
            'Electric car',
            'Hybrid car',
        ];

        foreach ($vehicle_types as $vehicle_type) {
            VehicleType::create(['name' => $vehicle_type]);
        }
    }
}
