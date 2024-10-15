<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
         return redirect()->route('home')->with('success', 'Login successful.');
    }

     return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
}


    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

         return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    public function logout(Request $request)
{
    Auth::logout();  
    return redirect('/')->with('success', 'Anda telah berhasil logout.');
}
}
