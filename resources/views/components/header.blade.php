<!-- resources/views/components/header.blade.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<nav class="bg-white shadow-md py-4 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <div>
            <img src="{{ asset('images/logo-bakkar.png') }}" alt="Brand Logo" class="h-10">
        </div>
        <ul class="hidden md:flex space-x-4 text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:text-gray-900">Beranda</a></li>
            <li><a href="{{ url('/menu') }}" class="hover:text-gray-900">Menu</a></li>
            <li><a href="{{ url('/about') }}" class="hover:text-gray-900">Tentang Kami</a></li>
        </ul>
        <!-- Cart Icon -->
        <button onclick="toggleCart()" class="relative text-gray-600 hover:text-gray-900">
            <i class="fas fa-basket-shopping fa-xl"></i>
        </button>
    </div>
</nav>