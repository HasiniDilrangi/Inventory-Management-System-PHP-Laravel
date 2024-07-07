<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You are successfully logged in!');
        } else {
            return redirect('/')->withErrors(['login' => 'Invalid credentials.']);
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You are logged out!');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:200',
        ]);
    
        $user = User::create([
            'name' => $incomingFields['name'],
            'email' => $incomingFields['email'],
            'password' => Hash::make($incomingFields['password']),
        ]);
    
        Auth::login($user);
        $request->session()->regenerate();
    
        return redirect('/')->with('success', 'Registration successful! Welcome ' . $user->name . '!');
    }
}
