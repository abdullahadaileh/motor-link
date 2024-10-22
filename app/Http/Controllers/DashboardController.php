<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count(); 
        $totalVehicles = Vehicle::count();
        $availableVehicles = Vehicle::where('status', 'available')->count(); // Adjust the condition based on your database structure
        $totalBookings = Booking::count(); 
    
        return view('dashboard.dashboard', compact('totalUsers', 'totalVehicles', 'availableVehicles','totalBookings'));
    }
}
