<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;





// //////////////////////////////////////////////////////////////////////////////////////////////////////
// Landing Routs //////////////// Landing Routs //////////////// Landing Routs  /////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////

// Landing Routs

Route::get('/', [VehicleTypeController::class, 'showFleet'])->name('motor-link');
Route::get('/motor-link-profile', [UserController::class, 'userProfile'])->name('motor-link-profile')->middleware('auth');
Route::put('/user/update/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');

// Home page
Route::get('/motor-link', function () {
    return view('landingpage.landing');
})->name('motor-link');
Route::get('/motor-link', [VehicleTypeController::class, 'showFleet'])->name('motor-link');

// About us 
Route::get('/motor-link-about', function () {
    return view('landingpage.pages.about');
})->name('motor-link-about');

// Contact
Route::get('/motor-link-contact', function () {
    return view('landingpage.pages.contactUs');
})->name('motor-link-contact');
Route::post('/motor-link-contact', [ContactController::class, 'store'])->name('motor-link-contact.store');
Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('motor-link-dashboard-contacts');

// Vehicles page
Route::get('/motor-link-vehicles', function () {
    return view('landingpage.pages.vehicles');
})->name('motor-link-vehicles');
Route::get('/motor-link-vehicles', [VehicleController::class, 'landingPage'])->name('motor-link-vehicles');
Route::get('/motor-link-vehicles/{vehicle}', [VehicleController::class, 'showLandingPage'])->name('motor-link-vehicle-details');

// Booking page
Route::get('/vehicles/{vehicle}/book', [BookingController::class, 'create'])->name('motor-link-vehicle-booking');
Route::post('/vehicles/{vehicle}/book', [BookingController::class, 'store'])->name('motor-link-vehicle-booking-store');




// //////////////////////////////////////////////////////////////////////////////////////////////////////
// Dashboard Routes //////////////// Dashboard Routes //////////////// Dashboard Routes  ////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////


// Dashboard page
Route::get('/motor-link-dashboard', function () {
    return view('dashboard.dashboard');
})->name('motor-link-dashboard');
Route::get('/motor-link-dashboard', [DashboardController::class, 'dashboard'])->name('motor-link-dashboard')->middleware('checkAdmin');


// User page
Route::get('/motor-link-dashboard-users', function () {
    return view('dashboard.pages.users');
})->name('motor-link-dashboard-users')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-addUser', function () {
    return view('dashboard.pages.addUser');
})->name('motor-link-dashboard-addUser')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-editUser', function () {
    return view('dashboard.pages.editUser');
})->name('motor-link-dashboard-editUser');

Route::get('/motor-link-dashboard-users-trashed', [UserController::class, 'trashed'])
    ->name('motor-link-dashboard-users-trashed');

Route::get('/dashboard/profile', [UserController::class, 'ownerProfile'])->name('motor-link-dashboard-profile')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-users', [UserController::class, 'index'])->name('motor-link-dashboard-users');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}', [UserController::class, 'show'])->name('motor-link-dashboard-showUser');

Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('motor-link-dashboard-editUser');

Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/users/restore/{id}', [UserController::class, 'restore'])->name('motor-link-dashboard-users-restore');


// Vehicles page

Route::get('motor-link-dashboard-vehicles', [VehicleController::class, 'index'])->name('motor-link-dashboard-vehicles-index')->middleware('checkAdmin');
Route::get('motor-link-dashboard-vehicles/create', [VehicleController::class, 'create'])->name('motor-link-dashboard-vehicles-create');
Route::post('motor-link-dashboard-vehicles', [VehicleController::class, 'store'])->name('motor-link-dashboard-vehicles-store');
Route::get('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'show'])->name('motor-link-dashboard-vehicles-show');
Route::get('motor-link-dashboard-vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('motor-link-dashboard-vehicles-edit');
Route::put('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'update'])->name('motor-link-dashboard-vehicles-update');
Route::delete('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('motor-link-dashboard-vehicles-destroy');


// Vehicle Types page
Route::get('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'index'])->name('motor-link-dashboard-vehicle-types')->middleware('checkAdmin');
Route::get('motor-link-dashboard-vehicle-types/create', [VehicleTypeController::class, 'create'])->name('motor-link-dashboard-vehicle-types-create');
Route::post('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'store'])->name('motor-link-dashboard-vehicle-types-store');
Route::get('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'show'])->name('motor-link-dashboard-vehicle-types-show');
Route::get('motor-link-dashboard-vehicle-types/{type}/edit', [VehicleTypeController::class, 'edit'])->name('motor-link-dashboard-vehicle-types-edit');
Route::put('/motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'update'])->name('motor-link-dashboard-vehicle-types-update');
Route::delete('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'destroy'])->name('motor-link-dashboard-vehicle-types-destroy');

// Logout 
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/motor-link');
})->name('logout');
Auth::routes();