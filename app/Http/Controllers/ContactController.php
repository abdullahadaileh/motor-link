<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show the contact form
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.pages.contacts.index', compact('contacts'));
    }
    
    // Store the contact form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);
    
        try {
            // Attempt to create a new contact entry
            Contact::create($request->all());
            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return back()->with('error', 'There was an issue sending your message. Please try again later.');
        }
    }
    }
