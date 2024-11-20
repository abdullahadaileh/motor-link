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
        $bookings = Booking::with(['vehicle', 'user'])
                    ->orderBy('id', 'asc') 
                    ->get(); 
    
        return view('dashboard.pages.bookings', compact('bookings'));
    }
        
    public function create(Vehicle $vehicle)
    {
        return view('landingpage.pages.bookings.create', compact('vehicle'));
    }
    
    public function store(Request $request, Vehicle $vehicle)
    {

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'delivery_option' => 'required|string',
        ]);
    

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
    

        $rental_days = $endDate->diffInDays($startDate) + 1;
        $vehicle_rate_per_day = $vehicle->price_per_day;
        $calculated_total_price = $rental_days * $vehicle_rate_per_day;
    

        if ($request->delivery_option === 'delivery') {
            $calculated_total_price += 3;
        }
    
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
    
        return redirect()->route('motor-link-vehicles')->with('success', 'Booking successful!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,Approved,Declined,Canceled', // Add 'Canceled' to the validation
        ]);
    
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
    
        $vehicle = Vehicle::findOrFail($booking->vehicle_id); // Get the associated vehicle
    
        // Handle the vehicle status based on booking status
        if ($request->status === 'Approved') {
            $vehicle->status = 'unavailable'; 
        } elseif ($request->status === 'Pending' || $request->status === 'Declined' || $request->status === 'Canceled') {
            $vehicle->status = 'available';  
        }
            
        // Save the updated vehicle status
        $vehicle->save();
    
        // Save the booking with the new status
        $booking->save();
    
        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    
    public function show($id)
    {
        $booking = Booking::with(['vehicle', 'user'])->findOrFail($id);
        return view('dashboard.pages.show', compact('booking'));
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
    
        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }
    
    public function cancelBooking($id)
{
    $booking = Booking::where('user_id', auth()->id())->findOrFail($id);

    // Check if the booking is already canceled or completed
    if (in_array($booking->status, ['canceled', 'completed'])) {
        return redirect()->back()->with('error', 'Cannot cancel this booking.');
    }

    $booking->status = 'canceled';
    $booking->save();

    return redirect()->back()->with('success', 'Booking canceled successfully.');
}


}
