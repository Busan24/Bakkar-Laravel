<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layout.main')

@section('content')
    <h2 class="text-4xl font-bold ml-2">Produk</h2>

    <!-- Tambahkan Data Produk Button -->
    <div class="ml-2 mt-2 pb-0 mb-0 bg-white rounded-t-2xl">
        <a class="inline-flex items-center px-2 py-2 my-4 ml-2 text-sm font-bold text-center text-white transition-all ease-in border-0 rounded-lg shadow-soft-md bg-orange-400 hover:shadow-soft-2xl hover:scale-102"
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
    </div>

    

    <!-- Grid Card Layout -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ml-3 mr-3">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                <!-- Bagian gambar produk -->
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    
                <!-- Bagian konten produk -->
                <div class="p-4 flex-grow flex flex-col justify-between">
                    <div class="flex flex-col flex-grow">
                        <!-- Nama Produk -->
                        <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>

                        <!-- Kategori Produk -->
                        <p class="text-gray-600 mt-1">{{ $product->category->name ?? 'Tanpa Kategori' }}</p>
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
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection
