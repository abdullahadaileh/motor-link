<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use File;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.pages.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $vehicleTypes = [
            'Economical car', 'Jeep car', 'Luxury car', 'Pickup Truck',
            'Sport car', 'SUV', 'Hatchback', 'Sedan', 'Minivan',
            'Crossover', 'Coupe', 'Convertible', 'Station Wagon',
            'Electric car', 'Hybrid car'
        ];
        
        return view('dashboard.pages.vehicles.create', compact('vehicleTypes'));

    }


    // landing page
    public function landingPage()
{
    $vehicles = Vehicle::all(); 
    return view('landingpage.pages.vehicles', compact('vehicles'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
        'type' => 'required|string',
        'price_per_day' => 'required|numeric',
        'fuel_type' => 'required|string',
        'description' => 'nullable|string',
        'status' => 'required|string',
    ]);

    $imagePath = null;

    // Handle image upload
    if ($request->has('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'dashboard/images/uploads/';
        $file->move($path, $filename);
        $imagePath = $path . $filename; 
    }

    if ($imagePath) {
        $validatedData['image'] = $imagePath;
    }

    Vehicle::create($validatedData);
    return redirect()->route('motor-link-dashboard-vehicles-index')->with('success', 'Vehicle created successfully.');
}

    public function show(Vehicle $vehicle)
    {
        return view('dashboard.pages.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes = [
            'Economical car', 'Jeep car', 'Luxury car', 'Pickup Truck',
            'Sport car', 'SUV', 'Hatchback', 'Sedan', 'Minivan',
            'Crossover', 'Coupe', 'Convertible', 'Station Wagon',
            'Electric car', 'Hybrid car'
        ];
    
        return view('dashboard.pages.vehicles.edit', compact('vehicle', 'vehicleTypes'));

    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
            'type' => 'required|string',
            'price_per_day' => 'required|numeric',
            'fuel_type' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);
    
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'dashboard/images/uploads/';
            $file->move($path, $filename);
            $imagePath = $path . $filename;
    
            if (File::exists($vehicle->image)) {
                File::delete($vehicle->image);
            }
    
            $validatedData['image'] = $imagePath;
        }
    
        $vehicle->update($validatedData);
    
        return redirect()->route('motor-link-dashboard-vehicles-index')
                         ->with('success', 'Vehicle updated successfully.');
    }
    
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('motor-link-dashboard-vehicles-index')->with('success', 'Vehicle deleted successfully.'); // Updated route name
    }
}
