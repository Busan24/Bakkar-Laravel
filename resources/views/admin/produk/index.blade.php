    <head>
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    @extends('layout.main')

    @section('content')
    <h2 class="text-4xl font-bold ml-2">Produk</h2>
    <!-- Bar Pencarian dan Tambahkan Data Produk -->
    <div class="flex items-center ml-2 mt-2 pb-0 mb-0 bg-white rounded-t-2xl">
        <!-- Tambahkan Data Produk Button -->
        <a class="inline-flex items-center px-2 py-2 my-4 mr-4 ml-2 text-sm font-bold text-center text-white transition-all ease-in border-0 rounded-lg shadow-soft-md bg-orange-400 hover:shadow-soft-2xl hover:scale-102"
            href="/createproduk">
            <svg class="w-4 h-4 mr-2 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292.377 292.377" xml:space="preserve">
                <g>
                    <path d="M146.188,0C65.576,0,0,65.582,0,146.188s65.576,146.188,146.188,146.188s146.188-65.582,146.188-146.188S226.801,0,146.188,0z M194.962,152.155h-42.806v42.8c0,3.3-2.667,5.967-5.967,5.967
                    c-3.3,0-5.967-2.667-5.967-5.967v-42.8H97.415c-3.294,0-5.967-2.673-5.967-5.967s2.673-5.967,5.967-5.967h42.806V97.415
                    c0-3.294,2.667-5.967,5.967-5.967c3.3,0,5.967,2.673,5.967,5.967v42.806h42.806c3.3,0,5.967,2.673,5.967,5.967
                    S198.261,152.155,194.962,152.155z"/>
                </g>
            </svg>
            Tambahkan Data Produk
        </a>

        <!-- Input Pencarian -->
        <div class="relative w-64 mr-4">
            <input type="text" id="searchInput" placeholder="Cari produk..." 
                class="border rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 w-full"/>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Ikon pencarian menggunakan SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l5.387 5.386a1 1 0 01-1.415 1.415l-5.386-5.387zM10 16a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Filter Kategori -->
        <div class="relative w-64">
            <select id="categoryFilter" 
                class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 w-full appearance-none">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <!-- Ikon dropdown -->
            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

        <!-- Tambahkan elemen untuk menampilkan pesan jika tidak ada produk ditemukan -->
        <div id="noResultsMessage" class="text-center text-red-500 mt-4 hidden">
            <p>Data tidak ada yang dicari.</p>
        </div>

        <!-- Grid Card Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ml-3 mr-3">
            @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full product-card">
                    <!-- Bagian gambar produk -->
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
        
                    <!-- Bagian konten produk -->
                    <div class="p-4 flex-grow flex flex-col justify-between">
                        <div class="flex flex-col flex-grow">
                            <!-- Nama Produk -->
                            <h2 class="product-name text-xl font-semibold text-gray-800">{{ $product->name }}</h2>

                            <!-- Kategori Produk -->
                            <p class="product-category text-gray-600 mt-1">{{ $product->category->name ?? 'Tanpa Kategori' }}</p>
                            <!-- Deskripsi Produk -->
                            <p class="text-gray-600 mt-2 flex-grow">
                                <span class="short-description">{{ Str::limit($product->description, 80) }}</span>
                                <span class="full-description hidden">{{ $product->description }}</span>
                                @if (Str::length($product->description) > 80)
                                    <a href="#" class="see-details text-blue-500 hover:underline ml-1">See details</a>
                                @endif
                            </p>
        
                            <!-- WhatsApp Produk -->
                            <p class="text-gray-600 mt-2">{{ $product->whatsapp }}</p>
        
                            <!-- Harga Produk -->
                            <h2 class="text-black-600 mt-2 text-xl font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                        </div>
        
                        <!-- Bagian tombol -->
                        <div class="mt-4 flex space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('edit', $product->id) }}" class="w-full text-center text-white px-4 py-2 rounded hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 flex items-center justify-center bg-orange-400 transition-all ease-in border-0 rounded-lg shadow-soft-md" style="height: 72%">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
        
                            <!-- Tombol Hapus -->
                            <form action="{{ route('produk.delete', $product->id) }}" method="POST" id="deleteForm{{ $product->id }}" class="w-full inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="w-full text-center text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 flex items-center justify-center bg-red-500 transition-all ease-in border-0 rounded-lg shadow-soft-md delete-btn" data-id="{{ $product->id }}">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('library/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const productCards = document.querySelectorAll('.product-card');
    const noResultsMessage = document.getElementById('noResultsMessage'); // Menambahkan referensi ke pesan tidak ada hasil

    // Fungsi untuk melakukan pencarian dan filter
    function filterProducts() {
        const searchText = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        let isAnyProductVisible = false; // Variabel untuk memeriksa apakah ada produk yang cocok

        productCards.forEach(card => {
        const productName = card.querySelector('.product-name').textContent.toLowerCase();
        const productCategory = card.querySelector('.product-category').textContent.toLowerCase();

        const matchesSearch = productName.includes(searchText);
        const matchesCategory = selectedCategory === "" || productCategory.includes(selectedCategory);

        if (matchesSearch && matchesCategory) {
            card.classList.remove('hidden');
            isAnyProductVisible = true; // Ada produk yang ditemukan
        } else {
            card.classList.add('hidden');
        }
        });

        // Menampilkan atau menyembunyikan pesan jika tidak ada produk yang ditemukan
        if (isAnyProductVisible) {
            noResultsMessage.classList.add('hidden');
        } else {
            noResultsMessage.classList.remove('hidden');
        }
    }

    // Event listener untuk input pencarian
    searchInput.addEventListener('input', filterProducts);

    // Event listener untuk filter kategori
    categoryFilter.addEventListener('change', filterProducts);
});


        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('deleteForm' + productId);
                        if (form) {
                            form.submit(); 
                        } else {
                            console.error('Form not found for product ID: ' + productId);
                        }
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
        // Dapatkan semua elemen tombol "See details"
        const seeDetailsButtons = document.querySelectorAll('.see-details');

        // Loop melalui setiap tombol
        seeDetailsButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();

                // Toggle visibility dari deskripsi penuh
                const parent = event.target.parentElement;
                const shortDescription = parent.querySelector('.short-description');
                const fullDescription = parent.querySelector('.full-description');

                if (fullDescription.classList.contains('hidden')) {
                    shortDescription.classList.add('hidden');
                    fullDescription.classList.remove('hidden');
                    button.textContent = 'Show less';
                } else {
                    shortDescription.classList.remove('hidden');
                    fullDescription.classList.add('hidden');
                    button.textContent = 'See details';
                }
            });
        });
    });

    </script>

        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
    @endsection
  