<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registrasi() {
        return view('authentication.registrasi');
    }

    public function login() {
        return view('authentication.login');
    }

    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first('email') // ambil error dari email
        ]);
    }

    // Simpan user jika email belum terdaftar
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json(['status' => 'success', 'message' => 'Registrasi berhasil!']);
}

 // Method for login
 public function postLogin(Request $request)
 {
     $request->validate([
         'email' => 'required|email',
         'password' => 'required|min:8',
     ]);

     // Check if the email has valid format
     if (!filter_var($request->email, FILTER_VALIDATE_EMAIL) || !str_contains($request->email, '@') || !str_contains($request->email, '.')) {
         return response()->json(['status' => 'error', 'message' => 'Invalid email format!']);
     }

     // Check credentials
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Jika login berhasil, redirect ke halaman produk
        return redirect()->route('produk')->with('success', 'Login Berhasil!');
    } else {
        // Jika login gagal, redirect kembali ke form login dengan pesan error
        return redirect()->back()->with('error', 'Email atau password salah!');
    }
 }

 public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
}

    
}
