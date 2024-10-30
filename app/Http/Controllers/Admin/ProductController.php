<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
{
    // Ambil data produk dengan relasi kategori
    $products = Product::with('category')->get();
    
    // Return view dengan header anti-cache
    return response()->view('admin.produk.index', [
            "products" => $products,
        ])
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
}


    public function create()
    {
    $categories = Category::all();
    return view('admin.produk.create', [
        'categories' => $categories,
    ]);
}   

    

public function store(Request $request)
{
    // Validasi input form
    $validated = $request->validate([
        'nama-produk' => 'required|string|max:255',
        'kategori_produk' => 'required|exists:categories,id',
        'deskripsi-produk' => 'required|string',
        'harga-produk' => 'required|numeric|min:0',
        'Whatsapp-produk' => 'required|string',
        'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Cek apakah produk dengan nama yang sama dan kategori yang sama sudah ada
    $existingProduct = Product::where('name', $request->input('nama-produk'))
        ->where('category_id', $request->input('kategori_produk'))
        ->first();

    if ($existingProduct) {
        return redirect()->route('create')->with('error', 'Produk sudah ada! tidak boleh double data');
    }

    // Menyimpan produk ke database
    $product = new Product();
    $product->name = $request->input('nama-produk');
    $product->category_id = $request->input('kategori_produk');
    $product->description = $request->input('deskripsi-produk');
    $product->price = $request->input('harga-produk');
    $product->whatsapp = $request->input('Whatsapp-produk');

    // Menangani file gambar produk
    if ($request->hasFile('gambar_produk')) {
        $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
        $product->photo = $imagePath;
    }

    $product->save();

    // Set session flash untuk menampilkan pesan sukses
    return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan!');
}


public function edit($id)
{
    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);
    // Ambil semua kategori untuk dropdown
    $categories = Category::all();

    return view('admin.produk.edit', [
        'product' => $product,
        'categories' => $categories
    ]);
}

public function update(Request $request, $id)
{
    // Validasi input form
    $validated = $request->validate([
        'nama-produk' => 'required|string|max:255',
        'kategori_produk' => 'required|exists:categories,id',
        'deskripsi-produk' => 'required|string',
        'harga-produk' => 'required|numeric|min:0',
        'Whatsapp-produk' => 'required|string',
        'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif',  // Gambar tidak wajib diunggah jika tidak ada
    ]);

    // Temukan produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Update data produk tanpa mengganti gambar jika tidak ada gambar baru
    $product->name = $request->input('nama-produk');
    $product->category_id = $request->input('kategori_produk');
    $product->description = $request->input('deskripsi-produk');
    $product->price = $request->input('harga-produk');
    $product->whatsapp = $request->input('Whatsapp-produk');

    // Periksa apakah ada gambar baru yang diunggah
    if ($request->hasFile('gambar_produk')) {
        // Hapus gambar lama jika ada gambar baru
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        // Simpan gambar baru
        $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
        $product->photo = $imagePath;
    } elseif ($request->input('old_gambar_produk')) {
        // Jika tidak ada gambar baru, gunakan gambar lama yang ada
        $product->photo = $request->input('old_gambar_produk');
    }

    // Simpan perubahan produk
    $product->save();

    // Redirect dengan pesan sukses
    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui!');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Hapus gambar produk dari penyimpanan jika ada
    if ($product->photo) {
        Storage::disk('public')->delete($product->photo);
    }

    // Hapus produk dari database
    $product->delete();

    // Set session flash untuk menampilkan pesan sukses
    return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
}


}  
