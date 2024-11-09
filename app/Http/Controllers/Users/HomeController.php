<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;
use View;

class HomeController extends Controller
{
    public function about(Request $request) {
        return view('user.about.index');
    }
    public function menu(Request $request)
    {
        // Fetch all products with category relation
        $products = Product::with('category') ->whereHas('category', function ($query) {
            $query->where('name', '!=', 'Flavor');
        })
        ->get();

        // Return view with anti-cache headers
        return response()->view('user.menu.index', [
                "products" => $products,
            ])
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
    

    public function index(Request $request)
    {
        // Fetch products under 'Flavour' category using category name or ID
        $products = Product::whereHas('category', function($query) {
            $query->where('name', 'Flavor'); // Assuming 'name' is the category field
        })->get();

        // Return view with anti-cache headers for 'Flavour' category products
        return response()->view('user.beranda.index', [
                "products" => $products,
            ])
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
