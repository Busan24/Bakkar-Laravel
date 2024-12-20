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
     // Ambil semua kategori
     $categories = Category::all();
    
    // Return view dengan header anti-cache
    return response()->view('admin.produk.index', [
            "products" => $products,
            "categories" => $categories,
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
        $request->validate([
            'nama-produk' => 'required|max:255',
            'kategori_produk' => 'required',
            'deskripsi-produk' => 'required',
            'harga-produk' => 'required|numeric',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Cek apakah nama produk yang baru sudah ada di database, kecuali produk yang sedang diedit
        $existingProduct = Product::where('name', $request->input('nama-produk'))
            ->where('id', '!=', $id)  // Tidak termasuk produk yang sedang diupdate
            ->first();

        if ($existingProduct) {
            // Jika produk sudah ada, beri alert dan kembali ke halaman edit
            return redirect()->route('edit', $id)
                ->with('error', 'Produk Duplikat (produk udah ada).');
        }

        // Proses update data produk
        $product = Product::findOrFail($id);
        $product->name = $request->input('nama-produk');
        $product->category_id = $request->input('kategori_produk');
        $product->description = $request->input('deskripsi-produk');
        $product->price = $request->input('harga-produk');

        // Proses gambar jika ada
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('images', 'public');
            $product->photo = $imagePath;
        } else {
            $product->photo = $request->input('old_gambar_produk');
        }

        $product->save();

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
