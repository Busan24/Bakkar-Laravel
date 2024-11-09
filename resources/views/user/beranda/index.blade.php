<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page Example</title>
  <!-- Swiper.js CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<!-- Swiper.js JavaScript -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    
    /* Animasi untuk fade-in */
    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in {
      opacity: 0;
      animation: fadeIn 1.5s forwards;
    }

    /* Animasi slide-in dari kiri */
    @keyframes slideInLeft {
      0% {
        opacity: 0;
        transform: translateX(-50px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .slide-in-left {
      opacity: 0;
      animation: slideInLeft 1.5s forwards;
    }

    /* Animasi slide-in dari kanan */
    @keyframes slideInRight {
      0% {
        opacity: 0;
        transform: translateX(50px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .slide-in-right {
      opacity: 0;
      animation: slideInRight 1.5s forwards;
    }

    /* Animasi saat scroll */
    .scroll-animation {
      opacity: 0;
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .scroll-visible {
      opacity: 1;
      transform: none;
    }
  </style>
</head>
<body class="bg-gray-100 ">
  <x-header />
  <!-- Carousel -->
  <section class="bg-white py-20 my-6">
    <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center justify-center overflow-hidden">
      <div class="relative w-full h-full">
        <!-- Slide Container -->
        <div id="carouselSlides" class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(0);">
          <!-- Slide 1 -->
          <div class="min-w-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-md">
            <h2 class="text-2xl font-semibold">Slide 1</h2>
          </div>
          <!-- Slide 2 -->
          <div class="min-w-full flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-md">
            <h2 class="text-2xl font-semibold">Slide 2</h2>
          </div>
          <!-- Slide 3 -->
          <div class="min-w-full flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700 text-white rounded-md">
            <h2 class="text-2xl font-semibold">Slide 3</h2>
          </div>
          <!-- Slide 4 -->
          <div class="min-w-full flex items-center justify-center bg-gradient-to-br from-green-500 to-green-700 text-white rounded-md">
            <h2 class="text-2xl font-semibold">Slide 4</h2>
          </div>
        </div>
        <!-- Navigation Buttons -->
        <button id="prevButton" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white text-gray-800 p-2 rounded-full shadow-lg">
          &#10094;
        </button>
        <button id="nextButton" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white text-gray-800 p-2 rounded-full shadow-lg">
          &#10095;
        </button>
      </div>
    </div>
  </section>

  <section id="home" class="bg-white py-20 mt-16 ">
    <div class="container mx-auto px-6 md:px-12">
      <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
        
        <!-- Left Column (Text + Image inside text) -->
        <div class="relative slide-in-left scroll-animation">
          <!-- Vertical Line -->
          <div class="absolute left-0 top-0 h-full w-1 bg-orange-500 hidden md:block"></div>
          
          <div class="pl-0 md:pl-8">
            <!-- AUTHENTIC SMOKY Text -->
            <h1 class="text-3xl md:text-4xl font-bold text-black text-center md:text-left fade-in">
              AUTHENTIC SMOKY
            </h1>

            <!-- Image + FRIED CHICKEN Text -->
            <div class="flex items-center justify-center md:justify-start space-x-4 mt-4">
              <!-- Gambar Ayam -->
              <img src={{asset('images/Ayam.png')}} alt="Ayam" class="h-16 w-16 object-cover fade-in">
              <!-- FRIED CHICKEN Text -->
              <h2 class="text-3xl md:text-4xl font-bold text-orange-500 fade-in">
                FRIED CHICKEN
              </h2>
            </div>

            <!-- Button -->
            <div class="text-center md:text-left mt-6">
              <a href="#about" class="inline-block text-black px-8 py-2.5 rounded-xl border-2 shadow-md border-orange-500 hover:bg-orange-600">
                Let gets know us
              </a>
            </div>
          </div>
        </div>
        <div class="flex justify-center relative">
           <!-- Orange Circle -->
          <div class="absolute bg-orange-500 `rounded-full h-72 w-72 -z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
          <img src="{{ asset('images/ayam-box.png') }}" alt="Fried Chicken Box" class="h-48 md:h-64 relative">
        </div>
      </div>
    </div>
  </section>

  <div id="cart" style="display: none;">
    <!-- Konten Cart -->
    <p>Your cart is empty.</p>
</div>
    <!-- Section for Product Cards -->
    <section id="products" class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-12">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Authentic Flavor</h2>
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
           
            @foreach($products as $product)
                <!-- Product Card 1 -->
                <a href="/products/1" class="group bg-white shadow-md rounded-lg overflow-hidden transform transition hover:scale-105 hover:shadow-xl">
                     <!-- Product 1 -->
                <div class="bg-white rounded-lg flex items-center">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-32 h-32 object-contain me-2 ms-1">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{$product->name}}</h3>
                        <p class="mt-2 text-gray-600">{{$product->description}}</p>
                    </div>
                </div>
                  @endforeach
                </a>
            </div>
        </div>
    </section>

  <!-- Contact Section -->
  <section id="contact" class="py-16 bg-white">
    <div class="container mx-auto px-6 md:px-12 text-center">
      <h2 class="text-3xl font-bold text-gray-800">Contact Us</h2>
      <p class="mt-4 text-gray-600">Feel free to get in touch with us for any inquiries.</p>
      <a href="mailto:info@brandname.com" class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700">Email Us</a>
    </div>
  </section>

  <!-- Footer -->
  <x-footer />
  <script src="/assets/js/cart.js"></script>
  <script src="/assets/js/carousel.js"></script>
  <x-cart />
</body>
</html>