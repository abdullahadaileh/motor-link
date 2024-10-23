<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        // Eager load user and vehicle along with bookings
        $bookings = Booking::with(['vehicle', 'user'])->get(); 
        return view('dashboard.pages.bookings', compact('bookings'));
    }
    
    public function create(Vehicle $vehicle)
    {
        return view('landingpage.pages.bookings.create', compact('vehicle'));
    }
    
    public function store(Request $request, Vehicle $vehicle)
    {
        // Validate the booking details
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'delivery_option' => 'required|string',
        ]);
    
        // Convert the string dates to Carbon instances
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
    
        // Calculate the rental days
        $rental_days = $endDate->diffInDays($startDate) + 1;
        $vehicle_rate_per_day = $vehicle->price_per_day;
        $calculated_total_price = $rental_days * $vehicle_rate_per_day;
    
        // Create the booking
        Booking::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $vehicle->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $calculated_total_price,
            'payment_method' => 'Cash on Delivery',
            'delivery_option' => $request->delivery_option,
            'booking_date' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Booking successful!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,Approved,Declined',
        ]);
    
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
    
        if ($request->status === 'Approved') {
            $vehicle = Vehicle::findOrFail($booking->vehicle_id);
            $vehicle->status = 'unavailable';
            $vehicle->save();
        }
    
        $booking->save();
    
        return redirect()->route('motor-link-dashboard-bookings-index')->with('success', 'Booking status updated successfully.');
    }
    }
