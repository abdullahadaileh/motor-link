<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleType; // للوصول إلى نموذج نوع المركبات
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
        $vehicleTypes = VehicleType::all(); // جلب جميع الأنواع ديناميكيًا
        return view('dashboard.pages.vehicles.create', compact('vehicleTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
            'type_id' => 'required|exists:vehicle_types,id', // الإشارة إلى جدول الأنواع الجديد
            'price_per_day' => 'required|numeric',
            'fuel_type' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $imagePath = null;

        // التعامل مع منطق رفع الصورة
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'dashboard/images/uploads/vehicles';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename; 
        }

        if ($imagePath) {
            $validatedData['image'] = $imagePath;
        }

        Vehicle::create($validatedData);
        return redirect()->route('motor-link-dashboard-vehicles-index')->with('success', 'Vehicle created successfully.');
    }

    public function landingPage()
    {
        $vehicles = Vehicle::all(); 
        return view('landingpage.pages.vehicles', compact('vehicles'));
    }
    
    public function show(Vehicle $vehicle)
    {
        return view('dashboard.pages.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes = VehicleType::all(); 
        return view('dashboard.pages.vehicles.edit', compact('vehicle', 'vehicleTypes'));
    }
    public function update(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
            'type_id' => 'required|exists:vehicle_types,id', // الإشارة إلى جدول الأنواع الجديد
            'price_per_day' => 'required|numeric',
            'fuel_type' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $imagePath = $vehicle->image; // الاحتفاظ بالصورة القديمة إذا لم يتم رفع صورة جديدة

        // التعامل مع منطق رفع الصورة
        if ($request->has('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($imagePath) {
                File::delete($imagePath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'dashboard/images/uploads/vehicles';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename; 
        }

        $validatedData['image'] = $imagePath;

        // تحديث البيانات
        $vehicle->update($validatedData);
        return redirect()->route('motor-link-dashboard-vehicles-index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        // حذف الصورة من التخزين
        if ($vehicle->image) {
            File::delete($vehicle->image);
        }
        $vehicle->delete();
        return redirect()->route('motor-link-dashboard-vehicles-index')->with('success', 'Vehicle deleted successfully.');
    }
}
