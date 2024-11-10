<!-- resources/views/components/header.blade.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* Add animation to burger icon */
    .burger.open i {
        transform: rotate(90deg); /* Rotate the burger to make it look like a close icon */
        transition: transform 0.3s ease-in-out;
    }

    .burger.close i {
        transform: rotate(0); /* Reset the burger icon back to the original */
        transition: transform 0.3s ease-in-out;
    }

    .nav-animate {
        animation: slideIn 0.3s ease-in-out;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(0);
        }
    }

    /* Styling the mobile navigation when it's visible */
    #mobileNavLinks {
        display: none;
    }

    #mobileNavLinks.visible {
        display: flex;
    }
</style>

<nav class="bg-white shadow-md py-4 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <!-- Logo -->
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-bakkar.png') }}" alt="Brand Logo" class="h-10">
            </a>
        </div>

        <!-- Menu Items - Hidden on small screens -->
        <ul id="navLinks" class="hidden md:flex space-x-4 text-gray-600">
            <li><a href="{{ url('/') }}" class="hover:text-gray-900">Beranda</a></li>
            <li><a href="{{ url('/menu') }}" class="hover:text-gray-900">Menu</a></li>
            <li><a href="{{ url('/about') }}" class="hover:text-gray-900">Tentang Kami</a></li>
        </ul>

        <!-- Icons: Cart and Burger Menu (for Mobile) -->
        <div class="flex items-center space-x-4">
            <!-- Cart Icon -->
            <button onclick="toggleCart()" class="relative text-gray-600 hover:text-gray-900">
                <i class="fas fa-basket-shopping fa-xl"></i>
                <span id="cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full px-2 hidden">0</span>
            </button>

            <!-- Burger Icon for Mobile - Hidden on larger screens -->
            <button id="burgerMenu" onclick="toggleMenu()" class="burger close text-gray-600 hover:text-gray-900 md:hidden">
                <i class="fas fa-bars fa-xl"></i>
            </button>
        </div>
    </div>

    <!-- Dropdown Menu for Mobile - Hidden by Default -->
    <ul id="mobileNavLinks" class="flex-col space-y-4 text-gray-600 px-6 pb-4 hidden">
        <li><a href="{{ url('/') }}" class="hover:text-gray-900">Beranda</a></li>
        <li><a href="{{ url('/menu') }}" class="hover:text-gray-900">Menu</a></li>
        <li><a href="{{ url('/about') }}" class="hover:text-gray-900">Tentang Kami</a></li>
    </ul>
</nav>

<script>
    function toggleMenu() {
        const mobileNavLinks = document.getElementById("mobileNavLinks");
        const burgerMenu = document.getElementById("burgerMenu");

        // Toggle the mobile navigation menu visibility
        mobileNavLinks.classList.toggle("hidden");
        mobileNavLinks.classList.toggle("visible");

        // Toggle the burger icon animation and class (open/close)
        if (burgerMenu.classList.contains("close")) {
            burgerMenu.classList.remove("close");
            burgerMenu.classList.add("open");
        } else {
            burgerMenu.classList.remove("open");
            burgerMenu.classList.add("close");
        }
    }
</script>
