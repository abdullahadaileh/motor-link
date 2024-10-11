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

    // Show
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('dashboard.pages.showUser', compact('user'));
}

    public function create()
    {
        return view('users.create');
    }

    // Store
    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,svg,jpeg,webp',
        ]);
    
        $imagePath = null;
    
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'dashboard/images/uploads/users';
            $file->move($path, $filename);
            $imagePath = $path . '/' . $filename; 
        }
    
        if ($imagePath) {
            $validatedUser['image'] = $imagePath;
        }
        User::create($validatedUser);
        \Log::info('Success message sent to session: User created successfully.');
        return redirect()->route('motor-link-dashboard-users')->with('success', 'User created successfully.');
    }
    

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pages.editUser', compact('user'));
    }

    // Update
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
    

            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
    
            $userData['image'] = $imagePath;
        }

        $user->update($userData);

        return redirect()->route('motor-link-dashboard-users')
                         ->with('success', 'User updated successfully.');
    }
    
    // Soft delete the specified user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('motor-link-dashboard-users')->with('success', 'User deleted successfully.');
    }

    // Restore a soft deleted user
    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard.pages.trashedUsers', compact('users'));
    }
    
    public function restore($id)
    {

        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
    
        return redirect()->route('motor-link-dashboard-users')->with('success', 'User restored successfully.');
    }}
