<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // Ambil semua data pengguna
        $users = User::all(); // Mengambil semua data pengguna

        // Kirim data ke view
        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function destroy($id) {
        $user = User::findOrFail($id); // Temukan pengguna berdasarkan ID
        
        // Cek apakah user yang dihapus adalah user yang sedang login
        if ($user->id === Auth::id()) {
            Auth::logout(); // Logout user
            $user->delete(); // Hapus pengguna
            return redirect()->route('login')->with('success', 'User deleted and logged out successfully!'); // Redirect ke halaman login
        }

        $user->delete(); // Hapus pengguna
        return redirect()->route('user')->with('success', 'User deleted successfully!'); // Redirect dengan pesan sukses
    }

    // public function edit($id) {
    //     // Pastikan user hanya bisa mengedit profilnya sendiri
    //     if (Auth::id() != $id) {
    //         return redirect()->route('user')->withErrors('Anda tidak memiliki izin untuk mengedit profil ini.');
    //     }
    
    //     // Ambil data pengguna
    //     $user = User::findOrFail($id);
    //     return view('admin.user.edit', compact('user'));
    // }
    

    // public function update(Request $request, $id) {
    //     $user = User::findOrFail($id);
    
    //     // Validasi input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'name' => 'required|string|max:255',
    //         'password_lama' => 'required',
    //         'password_baru' => 'required|string|min:8|confirmed', // Konfirmasi password baru harus sama
    //     ]);
    
    //     // Cek apakah password lama benar
    //     if (!Hash::check($request->password_lama, $user->password)) {
    //         return back()->withErrors(['password_lama' => 'Password saat ini tidak sesuai.']);
    //     }
    
    //     // Update data pengguna
    //     $user->email = $request->email;
    //     $user->name = $request->name;
    
    //     // Update password jika password baru diinput
    //     if ($request->password_baru) {
    //         $user->password = Hash::make($request->password_baru);
    //     }
    
    //     $user->save();
    
    //     return redirect()->route('user')->with('success', 'Profil berhasil diperbarui.');
    // }
    
    
    
}