<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Show the authenticated user's profile
    public function showProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        $feedbacks = Feedback::where('user_id', $user->id)->latest()->get();
        return view('profile', compact('user', 'feedbacks')); // Pass the user to the view
    }

        // Show another user's profile
     public function viewUserProfile(User $user)
    {
        $feedbacks = Feedback::where('user_id', $user->id)->latest()->get(); 
        return view('users-profile', compact('user', 'feedbacks'));
    
    }

    // Update the profile
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'bio' => 'required|string',
            'expertise' => 'required|string',
            'availability' => 'required|string',
            'pricing' => 'required|string',
            'qualifications' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio'); // Add bio field
        $user->expertise = $request->input('expertise'); // Add expertise field
        $user->availability = $request->input('availability'); // Add availability field
        $user->pricing = $request->input('pricing'); // Add pricing field
        $user->qualifications = $request->input('qualifications'); // Add qualifications field

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save(); // Save changes

        return redirect('/my-profile')->with('success', 'Profile updated successfully!');
    }
}

