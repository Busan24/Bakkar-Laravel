<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu with Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    </style>
    
<x-header />
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
                    <div class="w-full md:w-1/2 mb-12 md:mb-0">
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            BAKKAR<br>FRIED<br>CHICKEN
                        </h1>
                        <p class="text-xl mb-8 text-gray-300">Nikmati kelezatan otentik Bakkar Fried Chicken dengan rasa gurih membara, perpaduan sempurna antara ayam juicy dan smoky.</p>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="#" class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full hover:border-orange-500 hover:bg-orange-500 hover:text-black transition duration-300 text-center">Lihat menunya sekarang!</a>
                        </div>
                    </div>
                    
                    <!-- Right Side: Features -->
                    <div class="w-full md:w-1/2 md:pl-12">
                        <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl">
                            <h2 class="text-2xl font-semibold mb-6">kenapa harus ayam kami?</h2>
                            <ul class="space-y-4">
                                <li class="flex items-center">
                                <svg class="w-6 h-6 mr-3 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.24 8.13a2 2 0 1 1 2.83 2.83l-5.66 5.66a4 4 0 0 1-5.66 0L2 13l1.66-1.66a4 4 0 0 1 5.66-5.66L14.24 8.13z"></path></svg>
                                    <span>Ayam Bakar yang Dimasak Sempurna</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12h-6.19a4.992 4.992 0 00-4.91-5.88A4.992 4.992 0 0012 3V1a1 1 0 00-1-1H9a1 1 0 00-1 1v2a4.992 4.992 0 00-3.09 3.12A4.992 4.992 0 003 12H1a1 1 0 00-1 1v3a1 1 0 001 1h2a4.992 4.992 0 003.09 3.12A4.992 4.992 0 0012 21v2a1 1 0 001 1h2a1 1 0 001-1v-2a4.992 4.992 0 003.09-3.12A4.992 4.992 0 0021 15h2a1 1 0 001-1v-3a1 1 0 00-1-1zM12 5.03c1.19 0 2.24.98 2.42 2.18L15.73 8h-3.46L11.58 7.21c.18-1.2 1.23-2.18 2.42-2.18zM12 13.73a1.5 1.5 0 01-1.5 1.5 1.5 1.5 0 01-1.5-1.5 1.5 1.5 0 011.5-1.5 1.5 1.5 0 011.5 1.5zM12 18c-2.79 0-5.22-2.14-5.7-5H7a1 1 0 000 2h2a1 1 0 011 1c0 2.21 1.79 4 4 4 2.21 0 4-1.79 4-4a1 1 0 011-1h2a1 1 0 000-2h-2c-.48 2.86-2.91 5-5.7 5z"></path></svg>
                                    <span>Ayam Bakar yang Super Lezat</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                    <span>Ayam dengan Bumbu Spesial</span>
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
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <img src="{{ asset('images/sertifikat-halal.png') }}" alt="sertifikat halal" class="w-full md:w-auto">
                    </div>
                </div>
                <div class="w-1/2 mb-8 px-8 md:block hidden">
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

            <div class="container mx-auto px-4 py-24 md:py-32 relative z-10">
            <div class="flex justify-start mb-5">
                    <div class="w-full md:w-1/2 bg-gradient-to-br from-black to-gray-800 shadow-lg rounded-lg overflow-hidde">
                        <div class="p-5">
                            <h2 class="text-2xl font-semibold mb-4">Baris Pertama</h2>
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe 
                                    src="https://www.youtube.com/embed/VIDEO_ID_1" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    class="w-full h-full">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Baris Kedua -->
                <div class="flex justify-end">
                    <div class="w-full md:w-1/2 bg-gradient-to-br from-black to-gray-800 shadow-lg rounded-lg overflow-hidden ">
                        <div class="p-5">
                            <h2 class="text-2xl font-semibold mb-4">Baris Kedua</h2>
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe 
                                    src="https://www.youtube.com/embed/VIDEO_ID_2" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    class="w-full h-full">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ... (previous script remains unchanged) ... -->
</body>
</html>

<x-footer></x-footer>
