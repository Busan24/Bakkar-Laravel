<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        
        /* Custom animations */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
        }
        /* Delay each card */
        .fade-delay-1 { animation-delay: 0.2s; }
        .fade-delay-2 { animation-delay: 0.4s; }
        .fade-delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body class="bg-gray-100 font-sans">
<x-header />
   <!-- Menu Section -->
   <section class="py-16 mt-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 fade-in-up">OUR MENU</h2>

        @php
            // Ambil semua kategori unik dari produk
            $categories = $products->pluck('category.name')->unique();
        @endphp

        @foreach ($categories as $category)
            <!-- Kategori Title dengan Background -->
            <div class="relative mt-8 fade-in-up" style="animation-delay: 0.2s;">
                <div class="absolute left-0 top-0 bg-yellow-400 h-full w-screen max-w-lg"></div>
                <div class="relative z-10 px-6 py-2 font-semibold text-lg text-white">{{ strtoupper($category) }}</div>
            </div>

            <!-- Menu Cards dengan Animasi Hover dan Fade -->
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($products->where('category.name', $category) as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 fade-in-up fade-delay-1">
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover me-2 ms-1">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-600">{{ $product->description }}</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-gray-700 font-bold">{{ $product->price / 1000 }}K</span>
                                <button onclick="addToCart('{{ $product->name }}', '{{ $product->description }}', {{ $product->price }})" class="bg-yellow-400 text-white px-4 py-2 rounded-md font-semibold hover:bg-yellow-500 transition duration-300">Pesan Pickup</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>


<x-footer />
<x-cart />
<script src="/assets/js/cart.js"></script>
</body>
</html>
