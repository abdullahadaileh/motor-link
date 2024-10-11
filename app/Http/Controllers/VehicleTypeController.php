<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    // Display a listing of vehicle types
    public function index()
    {
        $types = VehicleType::all();
        return view('dashboard.pages.vehicleTypes.index', compact('types'));
    }

    // Show the form for creating a new vehicle type
    public function create()
    {
        return view('dashboard.pages.vehicleTypes.create');
    }

    // Store a newly created vehicle type in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:vehicle_types,name',
        ]);

        VehicleType::create($validatedData);
        return redirect()->route('motor-link-dashboard-vehicle-types')->with('success', 'Vehicle Type created successfully.');
    }

    // Show the specified vehicle type
    public function show(VehicleType $vehicleType)
    {
        return view('dashboard.pages.vehicleTypes.show', compact('vehicleType'));
    }

    // Show the form for editing the specified vehicle type
    public function edit($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('dashboard.pages.vehicleTypes.edit', compact('vehicleType'));
    }
        // Update the specified vehicle type in storage
        public function update(Request $request, $id)
        {

            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        
            $vehicleType = VehicleType::findOrFail($id);
        
            $vehicleType->name = $request->input('name');
            $vehicleType->save();
        
            return redirect()->route('motor-link-dashboard-vehicle-types');
        }
        
    // Remove the specified vehicle type from storage
    public function destroy($id) 
    {
        $vehicleType = VehicleType::find($id); 
        if (!$vehicleType) {
            return redirect()->route('motor-link-dashboard-vehicle-types')->with('error', 'Vehicle Type not found.'); 
        }
    
        $vehicleType->delete();
        return redirect()->route('motor-link-dashboard-vehicle-types')->with('success', 'Vehicle Type deleted successfully.');
    }
        }
