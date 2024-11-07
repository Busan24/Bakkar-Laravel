<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // Tambahkan model Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        // Mengambil semua kategori
        $categories = Category::all();
        // Mengirimkan data kategori ke view
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:40',
            'color' => 'required|string',
        ]);
    
        $existingCategory = Category::where('name', $request->name)->first();
        if ($existingCategory) {
            return redirect()->route('category')->with('error', 'Category Produk sudah ada!');
        }
    
        Category::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);
    
        return redirect()->route('category')->with('success', 'Category Berhasil Ditambahkan!');
    }
    

    // Menghapus kategori
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category')->with('success', 'Category Berhasil dihapus!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:40',
            'color' => 'required|string',
        ]);
    
        $category = Category::findOrFail($id);
        $existingCategory = Category::where('name', $request->name)->where('id', '!=', $id)->first();
        if ($existingCategory) {
            return redirect()->route('category')->with('error', 'Category Produk sudah ada!');
        }
    
        $category->update([
            'name' => $request->name,
            'color' => $request->color,
        ]);
    
        return redirect()->route('category')->with('success', 'Category Berhasil Diperbarui!');
    }
    
}
