<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 

class FeedbackController extends Controller
{
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Feedback::create([
            'content' => $request->input('feedback'),
            'user_id' => $request->input('user_id'), 
            'submitted_by' => Auth::id(), 
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }

    public function index()
{

    $feedbacks = Feedback::with('user')->get();
    return view('users-profile', compact('feedbacks'));
}


}
