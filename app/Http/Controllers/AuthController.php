<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD

=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
<<<<<<< HEAD
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Menggunakan Auth::attempt untuk login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login successful.');
        }

        // Mengarahkan kembali dengan error jika login gagal
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])
                     ->withInput($request->only('email')); // Mengembalikan input email
    }

=======
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


>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
<<<<<<< HEAD

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
=======
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

<<<<<<< HEAD
        // Mengarahkan kembali jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat pengguna baru
        User::create([
=======
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

         User::create([
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

<<<<<<< HEAD
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();  
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
=======
         return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    public function logout(Request $request)
{
    Auth::logout();  
    return redirect('/')->with('success', 'Anda telah berhasil logout.');
}
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
}
