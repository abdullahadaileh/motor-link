<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;



Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

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
Route::post('/save-location', [UserController::class, 'saveLocation'])->name('save-location');




// //////////////////////////////////////////////////////////////////////////////////////////////////////
// Dashboard Routes //////////////// Dashboard Routes //////////////// Dashboard Routes  ////////////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////

// Dashboard page
Route::get('/motor-link-dashboard', [DashboardController::class, 'dashboard'])
    ->name('motor-link-dashboard')
    ->middleware('checkAdmin');

// User page
Route::get('/motor-link-dashboard-users', function () {
    return view('dashboard.pages.users');
})->name('motor-link-dashboard-users')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-addUser', function () {
    return view('dashboard.pages.addUser');
})->name('motor-link-dashboard-addUser')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-editUser', function () {
    return view('dashboard.pages.editUser');
})->name('motor-link-dashboard-editUser')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-users-trashed', [UserController::class, 'trashed'])
    ->name('motor-link-dashboard-users-trashed')->middleware('checkAdmin');

Route::get('/dashboard/profile', [UserController::class, 'ownerProfile'])
    ->name('motor-link-dashboard-profile')->middleware('checkAdmin');

Route::get('/motor-link-dashboard-users', [UserController::class, 'index'])
    ->name('motor-link-dashboard-users')->middleware('checkAdmin');

Route::get('users/create', [UserController::class, 'create'])
    ->name('users.create')->middleware('checkAdmin');

Route::post('users', [UserController::class, 'store'])
    ->name('users.store')->middleware('checkAdmin');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('motor-link-dashboard-showUser')->middleware('checkAdmin');

Route::get('users/{id}/edit', [UserController::class, 'edit'])
    ->name('motor-link-dashboard-editUser')->middleware('checkAdmin');

Route::put('users/{id}', [UserController::class, 'update'])
    ->name('users.update')->middleware('checkAdmin');

Route::delete('users/{id}', [UserController::class, 'destroy'])
    ->name('users.destroy')->middleware('checkAdmin');

Route::post('/users/restore/{id}', [UserController::class, 'restore'])
    ->name('motor-link-dashboard-users-restore')->middleware('checkAdmin');

// Vehicles page
Route::get('motor-link-dashboard-vehicles', [VehicleController::class, 'index'])
    ->name('motor-link-dashboard-vehicles-index')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicles/create', [VehicleController::class, 'create'])
    ->name('motor-link-dashboard-vehicles-create')->middleware('checkAdmin');

Route::post('motor-link-dashboard-vehicles', [VehicleController::class, 'store'])
    ->name('motor-link-dashboard-vehicles-store')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'show'])
    ->name('motor-link-dashboard-vehicles-show')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])
    ->name('motor-link-dashboard-vehicles-edit')->middleware('checkAdmin');

Route::put('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'update'])
    ->name('motor-link-dashboard-vehicles-update')->middleware('checkAdmin');

Route::delete('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'destroy'])
    ->name('motor-link-dashboard-vehicles-destroy')->middleware('checkAdmin');

// Vehicle Types page
Route::get('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'index'])
    ->name('motor-link-dashboard-vehicle-types')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicle-types/create', [VehicleTypeController::class, 'create'])
    ->name('motor-link-dashboard-vehicle-types-create')->middleware('checkAdmin');

Route::post('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'store'])
    ->name('motor-link-dashboard-vehicle-types-store')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'show'])
    ->name('motor-link-dashboard-vehicle-types-show')->middleware('checkAdmin');

Route::get('motor-link-dashboard-vehicle-types/{type}/edit', [VehicleTypeController::class, 'edit'])
    ->name('motor-link-dashboard-vehicle-types-edit')->middleware('checkAdmin');

Route::put('/motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'update'])
    ->name('motor-link-dashboard-vehicle-types-update')->middleware('checkAdmin');

Route::delete('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'destroy'])
    ->name('motor-link-dashboard-vehicle-types-destroy')->middleware('checkAdmin');

// Booking page
Route::get('motor-link-dashboard-bookings', [BookingController::class, 'index'])
    ->name('motor-link-dashboard-bookings-index')->middleware('checkAdmin');

Route::put('motor-link-dashboard-bookings/{id}', [BookingController::class, 'update'])
    ->name('motor-link-dashboard-bookings-update')->middleware('checkAdmin');
    
Route::get('motor-link-dashboard-bookings/{id}/show', [BookingController::class, 'show'])
    ->name('motor-link-dashboard-bookings-show')->middleware('checkAdmin');
Route::delete('motor-link-dashboard-bookings/{id}/delete', [BookingController::class, 'destroy'])
    ->name('motor-link-dashboard-bookings-delete')->middleware('checkAdmin');

// Logout 
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/motor-link');
})->name('logout')->middleware('checkAdmin');

Auth::routes();
