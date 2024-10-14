<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage.landing');
});


// Landing Page Routs

Route::get('/motor-link', function () {
    return view('landingpage.landing');
})->name('motor-link');

Route::get('/motor-link-about', function () {
    return view('landingpage.pages.about');
})->name('motor-link-about');

Route::get('/motor-link-contact', function () {
    return view('landingpage.pages.contactUs');
})->name('motor-link-contact');
use App\Http\Controllers\ContactController;

Route::post('/motor-link-contact', [ContactController::class, 'store'])->name('motor-link-contact.store');
Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('motor-link-dashboard-contacts');

Route::get('/motor-link', [VehicleTypeController::class, 'showFleet'])->name('motor-link');


// vehicles page
Route::get('/motor-link-vehicles', function () {
    return view('landingpage.pages.vehicles');
})->name('motor-link-vehicles');

Route::get('/motor-link-vehicles', [VehicleController::class, 'landingPage'])->name('motor-link-vehicles');

Route::get('/motor-link-vehicles/{vehicle}', [VehicleController::class, 'showLandingPage'])->name('motor-link-vehicle-details');





// Dashboard Page Routs

Route::get('/motor-link-dashboard', function () {
    return view('dashboard.dashboard');
})->name('motor-link-dashboard');

Route::get('/motor-link-dashboard', [DashboardController::class, 'dashboard'])->name('motor-link-dashboard');


// user controller

Route::get('/motor-link-dashboard-addUser', function () {
    return view('dashboard.pages.addUser');
})->name('motor-link-dashboard-addUser');

Route::get('/motor-link-dashboard-editUser', function () {
    return view('dashboard.pages.editUser');
})->name('motor-link-dashboard-editUser');

Route::get('/motor-link-dashboard-users', function () {
    return view('dashboard.pages.users');
})->name('motor-link-dashboard-users');

Route::get('/motor-link-dashboard-users-trashed', [UserController::class, 'trashed'])
    ->name('motor-link-dashboard-users-trashed');


Route::get('/dashboard/profile', [UserController::class, 'profile'])->name('motor-link-dashboard-profile');



Route::get('/motor-link-dashboard-users', [UserController::class, 'index'])->name('motor-link-dashboard-users');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}', [UserController::class, 'show'])->name('motor-link-dashboard-showUser');

Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('motor-link-dashboard-editUser');

Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/users/restore/{id}', [UserController::class, 'restore'])->name('motor-link-dashboard-users-restore');






// Vehicles

Route::get('motor-link-dashboard-vehicles', [VehicleController::class, 'index'])->name('motor-link-dashboard-vehicles-index');

Route::get('motor-link-dashboard-vehicles/create', [VehicleController::class, 'create'])->name('motor-link-dashboard-vehicles-create');
Route::post('motor-link-dashboard-vehicles', [VehicleController::class, 'store'])->name('motor-link-dashboard-vehicles-store');
Route::get('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'show'])->name('motor-link-dashboard-vehicles-show');
Route::get('motor-link-dashboard-vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('motor-link-dashboard-vehicles-edit');
Route::put('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'update'])->name('motor-link-dashboard-vehicles-update');
Route::delete('motor-link-dashboard-vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('motor-link-dashboard-vehicles-destroy');


// Vehicle Types Routes
Route::get('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'index'])->name('motor-link-dashboard-vehicle-types');
Route::get('motor-link-dashboard-vehicle-types/create', [VehicleTypeController::class, 'create'])->name('motor-link-dashboard-vehicle-types-create');
Route::post('motor-link-dashboard-vehicle-types', [VehicleTypeController::class, 'store'])->name('motor-link-dashboard-vehicle-types-store');
Route::get('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'show'])->name('motor-link-dashboard-vehicle-types-show');
Route::get('motor-link-dashboard-vehicle-types/{type}/edit', [VehicleTypeController::class, 'edit'])->name('motor-link-dashboard-vehicle-types-edit');
Route::put('/motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'update'])->name('motor-link-dashboard-vehicle-types-update');
Route::delete('motor-link-dashboard-vehicle-types/{type}', [VehicleTypeController::class, 'destroy'])->name('motor-link-dashboard-vehicle-types-destroy');







Route::post('/logout', function () {
    Auth::logout();
    return redirect('/motor-link');
})->name('logout');

Auth::routes();

