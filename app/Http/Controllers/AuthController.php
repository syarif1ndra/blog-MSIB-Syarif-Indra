<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Pastikan ini ada
use Illuminate\Support\Facades\Hash; // Pastikan ini ada
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

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Jika login berhasil, arahkan ke halaman Home
        return redirect()->route('home')->with('success', 'Login successful.');
    }

    // Jika login gagal, kembali ke halaman login dengan pesan error
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
}


    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Validasi email unik
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
        ]);

        // Redirect setelah berhasil mendaftar
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    public function logout(Request $request)
{
    Auth::logout(); // Mengeluarkan pengguna

    return redirect('/')->with('success', 'Anda telah berhasil logout.');
}
}
