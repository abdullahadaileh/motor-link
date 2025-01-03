<?php

namespace App\Http\Controllers;

use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all();
        return view('dashboard.pages.users', compact('users'));
    }

    // Show user by ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pages.showUser', compact('user'));
    }

    // User Profile
    public function userProfile()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
        $user = auth()->user();
        $bookings = $user->bookings()->with('vehicle')->get();
        if ($user->role === 'owner') {
            return redirect()->route('motor-link-dashboard-profile');
        }

        return view('landingpage.pages.userProfile', compact('user', 'bookings'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Validation for new password
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->location = $request->location;
    
        // Handle image upload like in the second code
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'dashboard/images/uploads/users';
            $file->move($path, $filename); // Moves the file to the uploads directory
            $imagePath = $path . '/' . $filename; // The file path to save in the database
            
            // Delete the old image if it exists
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            
            $user->image = $imagePath; // Update image path
        }
    
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); 
        }
    
        $user->save();
    
        return redirect()->route('motor-link-profile')->with('success', 'Profile updated successfully.');
    }

    // Owner Profile
    public function ownerProfile()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
        $user = auth()->user();

        if ($user->role !== 'owner') {
            return redirect()->route('motor-link-profile');
        }

        return view('dashboard.pages.ownerProfile', compact('user'));
    }

    public function updateOwnerProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed', // Validate password if provided
        ]);
    
        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
    
                // Handle image upload like in the second code
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $path = 'dashboard/images/uploads/users';
                    $file->move($path, $filename); 
                    $imagePath = $path . '/' . $filename; 
                    
                    // Delete the old image if it exists
                    if (File::exists(public_path($user->image))) {
                        File::delete(public_path($user->image));
                    }
                    
                    $user->image = $imagePath; 
                }
                
        // Update password if a new one is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('motor-link-profile')->with('success', 'Profile updated successfully.');
    }
        
    public function create()
    {
        return view('users.create');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
            'location' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'dashboard/images/uploads/users';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename; 
        }

        if ($imagePath) {
            $validatedUser['image'] = $imagePath;
        }
        
        $validatedUser['location'] = $request->location;

        User::create($validatedUser);
        \Log::info('User created successfully.');
        return redirect()->route('motor-link-dashboard-users')->with('success', 'User created successfully.');
    }

    public function saveLocation(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
        ]);
    
        $user = auth()->user(); 
    
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
        }
    
        $user->location = $request->location; 
        $user->save();
    
        return response()->json(['success' => true, 'message' => 'Location saved successfully!']);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pages.editUser', compact('user'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone_number' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
        ]);

        $user = User::findOrFail($id);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'dashboard/images/uploads/users';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename;

            // Delete old image if exists
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $userData['image'] = $imagePath;
        }

        $user->update($userData);

        return redirect()->route('motor-link-dashboard-users')->with('success', 'User updated successfully.');
    }

    // Soft delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('motor-link-dashboard-users')->with('success', 'User deleted successfully.');
    }

    // Show trashed users
    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard.pages.trashedUsers', compact('users'));
    }
    
    // Restore a soft deleted user
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('motor-link-dashboard-users')->with('success', 'User restored successfully.');
    }
}
