<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Create 50 vehicles using the factory
        Vehicle::factory()->count(50)->create();
    }
}
