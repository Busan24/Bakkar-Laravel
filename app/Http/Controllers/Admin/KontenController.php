<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
    $konten = Konten::all(); // Mengambil semua data konten
    return view('admin.konten.index', compact('konten'));
    }


    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'judul_konten' => 'required',
        'isi_konten' => 'required',
    ]);

    // Simpan data ke database
    Konten::create([
        'judul_konten' => $request->judul_konten,
        'isi_konten' => $request->isi_konten,
    ]);

    // Kembalikan ke halaman dengan alert sukses
    return redirect()->back()->with('success', 'Konten berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'judul_konten' => 'required',
        'isi_konten' => 'required',
    ]);

    // Temukan data berdasarkan ID dan update
    $konten = Konten::findOrFail($id);
    $konten->update([
        'judul_konten' => $request->judul_konten,
        'isi_konten' => $request->isi_konten,
    ]);

    return redirect()->back()->with('success', 'Konten berhasil diupdate!');
}

public function destroy($id)
{
    // Hapus data berdasarkan ID
    $konten = Konten::findOrFail($id);
    $konten->delete();

    return redirect()->back()->with('success', 'Konten berhasil dihapus!');
}

    
}


