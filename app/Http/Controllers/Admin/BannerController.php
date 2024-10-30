<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        // Ambil semua data banner
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_konten' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk gambar
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png'; // Gambar default jika tidak ada
        }

        // Simpan data ke database
        Banner::create([
            'isi_konten' => $request->judul_konten,
            'gambar' => $imageName,
        ]);

        return redirect()->route('banner')->with('success', 'Banner berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
    $banner = Banner::find($id);

    // Validasi
    $request->validate([
        'judul_konten' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $banner->isi_konten = $request->judul_konten;

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if (file_exists(public_path('images/' . $banner->gambar))) {
            unlink(public_path('images/' . $banner->gambar));
        }

        // Simpan gambar baru
        $file = $request->file('gambar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $banner->gambar = $filename;
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $banner->gambar = $request->old_image;
    }

    $banner->save();

    return redirect()->route('banner')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        
        return redirect()->route('banner')->with('success', 'Banner berhasil dihapus.');
    }

}
