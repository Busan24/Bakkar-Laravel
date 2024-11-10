<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-bakkar.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(10px); }
        100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeOutDown {
            0% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(10px); }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease forwards;
        }

        .fade-out-down {
            animation: fadeOutDown 1s ease forwards;
        }

    </style>
    
<x-header />

<x-cart />
<div id="cart" style="display: none;">
    <!-- Konten Cart -->
    <p>Your cart is empty.</p>
</div>
<body class="font-sans">
    <!-- ... (previous header code remains unchanged) ... -->

    <main class="pt-16">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-black to-gray-800 text-white overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/about-ayam.jpg') }}'); opacity: 0.5;"></div>

            <div class="container mx-auto px-4 py-24 md:py-32 relative z-10">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <!-- Left Side: Company Info -->
                    <div class="w-full md:w-1/2 mb-12 md:mb-0 observer-item">
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            BAKKAR<br>FRIED<br>CHICKEN
                        </h1>
                        <p class="text-xl mb-8 text-gray-300">Nikmati kelezatan otentik Bakkar Fried Chicken dengan rasa gurih membara, perpaduan sempurna antara ayam juicy dan smoky.</p>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="{{ url('/menu') }}" class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full hover:border-orange-500 hover:bg-orange-500 hover:text-black transition duration-300 text-center">Lihat menunya sekarang!</a>
                        </div>
                    </div>
                    
                    <!-- Right Side: Features -->
                    <div class="w-full md:w-1/2 md:pl-12 observer-item">
                        <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl">
                            <h2 class="text-2xl font-semibold mb-6">kenapa harus ayam kami?</h2>
                            <ul class="space-y-4">
                                <li class="flex items-center">
                                    <i class="fas fa-drumstick-bite fa-lg" style="color: #FF5733;" ></i>
                                    <span class="ms-4">Ayam Bakar yang Dimasak Sempurna</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-drumstick-bite fa-lg" ></i>
                                    <span class="ms-4">Ayam Bakar yang Super Lezat</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-drumstick-bite fa-lg" style="color: #FF5733;" ></i>
                                    <span class="ms-4">Ayam dengan Bumbu Spesial</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Decorative Element -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
                </svg>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12 md:py-24">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Gambar tampil besar pada layar kecil -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0 observer-item">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <img src="{{ asset('images/sertifikat-halal.png') }}" alt="sertifikat halal" class="w-full md:w-auto">
                    </div>
                </div>                
                <div class="w-full md:w-1/2 mb-8 px-8 observer-item">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Bersertifikat Halal</h1>
                    <p class="text-xl text-gray-600 mb-6">
                        Kami bekerja sama hanya dengan pemasok ayam yang telah bersertifikasi halal dan memiliki sistem bisnis terintegrasi,
                        mulai dari peternakan, pemotongan, hingga proses pengolahan. Hal ini dilakukan untuk memastikan bahwa standar kualitas
                        Bakkar Fried Chicken terpenuhi, sehingga kami dapat menyajikan produk yang aman, berkualitas, dan lezat bagi konsumen.
                    </p>
                </div>
            </div>
        </section>

        <section>
                    <div class="container mx-auto py-10 px-5">
                <!-- Baris Pertama -->
                

        </section>

        <section class="relative bg-gradient-to-br from-black to-gray-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40 overflow-hidden"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/about-ayam.jpg') }}'); opacity: 0.5;"></div>

    <div class="container mx-auto px-4 py-24 md:py-32 relative z-10 observer-item">
        @foreach($kontens as $index => $konten)
            <div class="flex {{ $index % 2 == 0 ? 'justify-start' : 'justify-end' }} mb-5">
                <div class="w-full md:w-1/2 bg-gradient-to-br from-black to-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <div class="p-5">
                        <h2 class="text-2xl font-semibold mb-4">{{ $konten->judul_konten }}</h2>
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe 
                                src="{{$konten->isi_konten}}<" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                                class="w-full h-full">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


    </main>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        // Membuat observer untuk mendeteksi elemen yang masuk atau keluar viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Tambahkan kelas fade-in-up saat elemen muncul
                    entry.target.classList.add('fade-in-up');
                    entry.target.classList.remove('fade-out-down');
                } else {
                    // Tambahkan kelas fade-out-down saat elemen keluar dari viewport
                    entry.target.classList.remove('fade-in-up');
                    entry.target.classList.add('fade-out-down');
                }
            });
        }, {
            threshold: 0.1 // Menentukan seberapa banyak elemen yang harus terlihat
        });

        // Observe setiap elemen yang ingin dianimasikan
        document.querySelectorAll('.observer-item').forEach(item => {
            observer.observe(item);
        });
    });

    </script>
    <!-- ... (previous script remains unchanged) ... -->
</body>
</html>

<x-footer></x-footer>
