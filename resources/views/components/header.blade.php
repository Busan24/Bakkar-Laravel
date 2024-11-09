<!-- resources/views/components/header.blade.php -->
<nav class="bg-white shadow-md py-4 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <div>
            <img src="{{ asset('images/logo-bakkar.png') }}" alt="Brand Logo" class="h-10">
        </div>
        <ul class="hidden md:flex space-x-4 text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:text-gray-900">Home</a></li>
            <li><a href="{{ url('/about') }}" class="hover:text-gray-900">About</a></li>
            <li><a href="{{ url('/menu') }}" class="hover:text-gray-900">Menu</a></li>
            <li><a href="#contact" class="hover:text-gray-900">Contact</a></li>
        </ul>
        <!-- Cart Icon -->
        <button onclick="toggleCart()" class="relative text-gray-600 hover:text-gray-900">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M3 3h2l1 7h13l1-7h2"></path>
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
            </svg>
        </button>
    </div>
</nav>