<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_bakkar.png') }}" />
    <style>
        /* Custom animations */
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up {
            animation: fadeInUp 1.5s ease forwards;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
<x-header />

<!-- Menu Section -->
<section class="py-16 mt-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 fade-in-up">OUR MENU</h2>

        @php
            // Ambil semua kategori unik dari produk beserta warnanya
            $categories = $products->map(function ($product) {
                return [
                    'name' => $product->category->name,
                    'color' => $product->category->color
                ];
            })->unique('name');
        @endphp

        @foreach ($categories as $category)
            <!-- Kategori Title dengan Background Warna dari Database -->
            <div class="relative mt-8 observer-item fade-in-up" style="animation-delay: 0.2s;">
                <div class="absolute left-0 top-0 h-full w-screen max-w-lg" style="background-color: {{ $category['color'] }};"></div>
                <div class="relative z-10 px-6 py-2 font-semibold text-lg text-white">{{ strtoupper($category['name']) }}</div>
            </div>

            <!-- Menu Cards dengan Animasi Hover dan Fade -->
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($products->where('category.name', $category['name']) as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 observer-item fade-in-up ">
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
<script src="{{ asset('assets/js/cart.js') }}"></script>

<!-- Intersection Observer Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                } else {
                    entry.target.classList.remove('fade-in-up');
                }
            });
        });

        // Observe each product card
        document.querySelectorAll('.observer-item').forEach(item => {
            observer.observe(item);
        });
    });
</script>

</body>
</html>
