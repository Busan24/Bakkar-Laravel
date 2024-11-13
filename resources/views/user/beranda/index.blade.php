<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <!-- Swiper.js CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_bakkar.png') }}" />
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
<body class="bg-gray-100 ">
  <x-header />
  <section section class="relative bg-gradient-to-br from-black to-gray-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/about-ayam.jpg') }}'); opacity: 0.5;"></div>

  <!-- Carousel -->
  @if($banners->isNotEmpty()) <!-- Check if banners data is not empty -->
  <div class=" py-20 mt-6 px-4">
      <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center justify-center overflow-hidden">
          <div class="relative w-full h-full">
              <!-- Slide Container -->
              <div id="carouselSlides" class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(0);">
                  <!-- Loop through banners data -->
                  @foreach($banners as $banner)
                      <div class="min-w-full flex items-center justify-center">
                          <!-- Check if banner has an image -->
                          @if(!empty($banner->gambar))
                              <img src="{{ asset('images/' . $banner->gambar) }}" alt="{{ $banner->title ?? 'Banner Image' }}" class="w-full h-96 object-fill rounded-md">
                          @else
                              <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-md">
                                  <h2 class="text-2xl font-semibold">No Image Available</h2>
                              </div>
                          @endif
                      </div>
                  @endforeach
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
  </div>
  @else
  <div class="bg-white">
      <div class="container mx-auto text-center">
      </div>
  </div>
  @endif

<!-- Hero Section -->
  
    <div class="container mx-auto px-6 md:px-12 my-24">
      <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
        
        <!-- Left Column (Text + Image inside text) -->
        <div class="relative slide-in-left scroll-animation">
          <!-- Vertical Line -->
          <div class="absolute left-0 top-0 h-full w-1 bg-orange-400 hidden md:block"></div>
          
          <div class="pl-0 md:pl-8">
            <!-- AUTHENTIC SMOKY Text -->
            <h1 class="text-3xl md:text-4xl font-bold text-center md:text-left fade-in">
              AUTHENTIC SMOKY
            </h1>

            <!-- Image + FRIED CHICKEN Text -->
            <div class="flex items-center justify-center md:justify-start space-x-4 ">
              <!-- Gambar Ayam -->
              <img src={{asset('images/Ayam.png')}} alt="Ayam" class="h-16 w-16 object-cover fade-in">
              <!-- FRIED CHICKEN Text -->
              <h2 class="text-3xl md:text-4xl font-bold text-orange-400 fade-in">
                FRIED CHICKEN
              </h2>
            </div>

            <!-- Button -->
            <div class="text-center md:text-left mt-6">
              <a href="{{ url('/about') }}" class="inline-block px-8 py-2.5 rounded-xl border-2 shadow-md bg-orange-400 border-orange-400 hover:bg-orange-600">
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
    <section id="products" class="py-32 bg-white">
        <div class="container mx-auto px-6 md:px-12">
            <h2 class="text-3xl font-bold text-gray-800 text-center observer-item fade-in-up">Authentic Flavor</h2>
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
           
            @foreach($products as $product)
                <!-- Product Card 1 -->
                <a href="{{ url('/menu') }}" class="group bg-white shadow-md rounded-lg overflow-hidden transform transition hover:scale-105 hover:shadow-xl">
                     <!-- Product 1 -->
                <div class="bg-white rounded-lg flex items-center observer-item fade-in-up">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-32 h-32 object-contain me-2 ms-1">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{$product->name}}</h3>
                        <p class="mt-2 text-gray-600">{{$product->description}}</p>
                    </div>
                </div>
                  @endforeach
                </a>
                
            </div>
            <div class="flex w-full justify-center mt-24 text-center observer-item fade-in-up">
                    <a href="{{ url('/menu') }}" class="inline-block bg-orange-400 text-white px-8 py-3 rounded-full hover:bg-orange-600 rounded-xl">Lihat Menunya</a>
            </div>
        </div>
    </section>
   
    <section id="konten" class="py-12 pb-32 bg-white">
      <div class="container mx-auto px-6 md:px-12">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-12 observer-item fade-in-up">Tersedia juga di</h2>
          <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> <!-- Mengurangi gap -->
              @foreach($kontens as $konten)
                  <!-- Konten Card -->
                  <a href="{{ $konten->isi_konten }}" class="group bg-white shadow-md rounded-lg overflow-hidden transform transition hover:scale-105 hover:shadow-xl observer-item fade-in-up w-full max-w-xs mx-auto">
                      <div class="bg-white rounded-lg flex items-center justify-center h-full">
                          <div class="w-full p-4 flex justify-center">
                              <h3 class="text-xl font-bold text-gray-800 text-center">{{ $konten->judul_konten }}</h3> <!-- Menambahkan text-center pada h3 -->
                          </div>
                      </div>
                  </a>
              @endforeach
          </div>
      </div>
  </section>
  
  
  

  <!-- Footer -->
  <x-footer />
  <script src="{{ asset('assets/js/cart.js') }}"></script>
  <script src="{{ asset('assets/js/carousel.js') }}"></script>
  <x-cart />
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
