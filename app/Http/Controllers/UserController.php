<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        $user = User::where('name', $incomingFields['loginname'])->first();

        if (!$user) {
            // Redirect back with an error message for non-existent username
            return back()->withErrors(['loginname' => 'This username does not exist. Please register an account!'])->withInput();
        }

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        }
        
            // If authentication fails, redirect back with an error message for incorrect password
        return back()->withErrors(['loginpassword' => 'Incorrect password.'])->withInput();

    }

    public function logout() {
        auth()->logout();
        return redirect ('/');
    }

    public function register(Request $request) {
 
            $messages = [
                'name.required' => 'A username is required.',
                'name.min' => 'Your username must be at least 3 characters.',
                'name.max' => 'Your username must not exceed 20 characters.',
                'name.unique' => 'This username has already been taken.',
                'email.required' => 'An email is required.',
                'email.email' => 'Your email must be a valid email address.',
                'email.unique' => 'Your email has already been taken.',
                'password.required' => 'A password is required.',
                'password.min' => 'Your password must be at least 8 characters.',
                'password.max' => 'Your password must not exceed 200 characters.',
            ];

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ], $messages);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect ('/');
    
    }
}