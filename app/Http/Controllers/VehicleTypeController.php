<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use File;

class VehicleTypeController extends Controller
{
    // Display a listing of vehicle types
    public function index()
    {
        $types = VehicleType::all();
        return view('dashboard.pages.vehicleTypes.index', compact('types'));
    }

    public function showFleet()
    {
        // Retrieve vehicle types from the database
        $vehicleTypes = VehicleType::all(); // Get all vehicle types without the 'vehicles' relationship
    
        return view('landingpage.landing', compact('vehicleTypes'));
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
        'image' => 'nullable|image',
        'description' => 'nullable|string',     
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'dashboard/images/uploads/vehicle_types';
        
        // Ensure the directory exists
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true);
        }

        $file->move(public_path($path), $filename); // Move to public path
        $imagePath = $path . '/' . $filename; // Set image path
    }

    // Include the image path in the validated data if it exists
    $validatedData['image'] = $imagePath; // This will be null if no image was uploaded

    // Create the VehicleType
    $vehicleType = VehicleType::create($validatedData);

    // Debug to see the created VehicleType
    // dd($vehicleType);

    return redirect()->route('motor-link-dashboard-vehicle-types')->with('success', 'Vehicle Type created successfully.');
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
            'image' => 'nullable|image',
            'description' => 'nullable|string',    
        ]);

        $vehicleType = VehicleType::findOrFail($id);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'dashboard/images/uploads/vehicle_types';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename;

            // Delete the old image
            if (File::exists(public_path($vehicleType->image))) {
                File::delete(public_path($vehicleType->image));
            }

            $vehicleType->image = $imagePath;
        }

        $vehicleType->name = $request->input('name');
        $vehicleType->description = $request->input('description');
        $vehicleType->save();

        return redirect()->route('motor-link-dashboard-vehicle-types')
                         ->with('success', 'Vehicle Type updated successfully.');
    }

    // Remove the specified vehicle type from storage
    public function destroy($id)
    {
        $vehicleType = VehicleType::find($id);
        if (!$vehicleType) {
            return redirect()->route('motor-link-dashboard-vehicle-types')->with('error', 'Vehicle Type not found.');
        }

        if ($vehicleType->image && File::exists(public_path($vehicleType->image))) {
            File::delete(public_path($vehicleType->image));
        }

        $vehicleType->delete();
        return redirect()->route('motor-link-dashboard-vehicle-types')->with('success', 'Vehicle Type deleted successfully.');
    }
}
