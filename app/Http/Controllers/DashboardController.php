<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\User;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count(); 
        $totalVehicles = Vehicle::count();
        $availableVehicles = Vehicle::where('status', 'available')->count();
        $totalBookings = Booking::count(); 
        $totalContacts = Contact::count();
        return view('dashboard.dashboard', compact('totalUsers', 'totalVehicles', 'availableVehicles','totalBookings','totalContacts'));
    }
}
