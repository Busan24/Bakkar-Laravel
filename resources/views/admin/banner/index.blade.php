<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layout.main')
@section('content')
<h2 class="text-4xl font-bold">Banner</h2>
<!-- cards -->
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border" style="margin-top: 20px">
        <div class="ml-2 mt-2 pb-0 mb-0 bg-white rounded-t-2xl">
            <!-- Tombol Tambah Kategori Produk -->
            {{-- <button class="inline-block px-2 py-2 my-4 text-sm font-bold text-center text-white bg-orange-500 rounded-lg" data-modal-toggle="addCategoryModal">
                Tambahkan Data Category Produk
            </button> --}}
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addContentModal" 
                class="inline-flex items-center px-4 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102"  
                style="background-color: #fb923c">
                <!-- Ikon SVG sebelum teks tombol -->
                <svg class="inline-block w-5 h-5 mr-2 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292.377 292.377" xml:space="preserve">
                    <g>
                        <path d="M146.188,0C65.576,0,0,65.582,0,146.188s65.576,146.188,146.188,146.188
                            s146.188-65.582,146.188-146.188S226.801,0,146.188,0z M194.962,152.155h-42.806v42.8c0,3.3-2.667,5.967-5.967,5.967
                            c-3.3,0-5.967-2.667-5.967-5.967v-42.8H97.415c-3.294,0-5.967-2.673-5.967-5.967s2.673-5.967,5.967-5.967h42.806V97.415
                            c0-3.294,2.667-5.967,5.967-5.967c3.3,0,5.967,2.673,5.967,5.967v42.806h42.806c3.3,0,5.967,2.673,5.967,5.967
                            S198.261,152.155,194.962,152.155z"/>
                    </g>
                </svg>
                Tambahkan Banner
            </a>
        </div>
        <!-- Warning Notice -->
        <div id="tipsNotice" class="relative bg-blue-200/70 border border-dashed border-blue-500 text-blue-800 px-4 py-3 rounded mb-4 mx-6">
            <strong class="font-bold">Tips:</strong>
            <span class="block sm:inline">Pastikan ukuran banner yang kamu buat adalah 1024x384.</span>
            <button id="closeNotice" type="button" class="absolute top-1 right-2 text-blue-800 hover:text-blue-900 font-bold">
                &times;
            </button>
        </div>
        <!-- Modal Tambah Banner -->
        <div class="modal fade" id="addContentModal" tabindex="-1" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addContentForm" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContentModalLabel">Tambahkan Konten</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="judul_konten">Isi</label>
                                <input type="text" class="form-control" id="judul_konten" name="judul_konten" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control-file mb-3" id="gambar" name="gambar" accept="image/png, image/jpeg" required>
                                <!-- Menampilkan gambar default terlebih dahulu -->
                                <img id="previewImage" src="{{ asset('assets/img/emptyImage.png') }}" alt="Preview" class="mt-2" style="width: 100%; height: auto; object-fit: contain;">
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn text-white hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 bg-orange-400 transition-all ease-in border-0 rounded-lg shadow-soft-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Konten -->
        <div class="modal fade" id="editContentModal" tabindex="-1" aria-labelledby="editContentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editContentForm" action="{{ route('banner.update', 'banner_id') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editContentModalLabel">Edit Konten</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_judul_konten">Isi</label>
                                <input type="text" class="form-control" id="edit_judul_konten" name="judul_konten" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_gambar">Gambar</label>
                                <input type="file" class="form-control-file mb-3" id="edit_gambar" name="gambar" accept="image/png, image/jpeg">
                                <!-- Menampilkan gambar lama jika ada -->
                                <img id="previewEditImage" src="" alt="Preview" class="mt-2" style="width: 100%; height: auto; object-fit: contain;">
                                <!-- Hidden input untuk menyimpan nama gambar lama -->
                                <input type="hidden" id="old_image" name="old_image" value="">
                            </div>
                        </div>
                                                                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn text-white hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 bg-orange-400 transition-all ease-in border-0 rounded-lg shadow-soft-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Banner List Section -->
        <section class="bg-white py-2 px-4">
            <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center justify-center overflow-hidden">
                <div class="relative w-full h-full">
                    <!-- Cek jika ada banner -->
                    @if($banners->isEmpty())
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-md">
                            <h2 class="text-2xl font-semibold text-white">Kamu belum nambahin banner nih</h2>
                        </div>
                    @else
                        <!-- Slide Container -->
                        <div id="carouselSlides" class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(0);">
                            <!-- Loop through banners data -->
                            @foreach($banners as $banner)
                                <div class="min-w-full flex items-center justify-center relative">
                                    <!-- Check if banner has an image -->
                                    @if(!empty($banner->gambar))
                                        <div class="w-full h-96 relative">
                                            <img src="{{ asset('images/' . $banner->gambar) }}" 
                                                alt="{{ $banner->isi_konten ?? 'Banner Image' }}" 
                                                class="w-full h-full object-cover rounded-md">

                                            <!-- Overlay untuk Judul dan Tombol Aksi -->
                                            <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center p-4 rounded-md">
                                                <h2 class="text-2xl font-semibold text-white mb-4">{{ $banner->isi_konten }}</h2>
                                            <div class="grid grid-cols-1 gap-4 mt-8">
                                                <!-- Tombol Edit -->
                                                <a href="javascript:void(0)" 
                                                class="edit-btn text-white bg-orange-500 hover:bg-orange-600 px-6 py-3 rounded-lg flex items-center justify-center transition-all"
                                                data-id="{{ $banner->id }}"
                                                data-isi="{{ $banner->isi_konten }}"
                                                data-gambar="{{ asset('images/' . $banner->gambar) }}">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" class="deleteForm inline-block ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="delete-btn text-white bg-red-500 hover:bg-red-600 px-6 py-3 rounded-lg flex items-center justify-center transition-all"
                                                            data-id="{{ $banner->id }}">
                                                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-md">
                                            <h2 class="text-2xl font-semibold">No Image Available</h2>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

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


    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('library/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>

    <script>

    const carouselSlides = document.getElementById('carouselSlides');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentIndex = 0;

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : {{ count($banners) - 1 }};
            updateCarousel();
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex < {{ count($banners) - 1 }}) ? currentIndex + 1 : 0;
            updateCarousel();
        });

        function updateCarousel() {
            const translateXValue = -currentIndex * 100;
            carouselSlides.style.transform = `translateX(${translateXValue}%)`;
        }
        // Mendapatkan elemen notice dan tombol close
        const tipsNotice = document.getElementById('tipsNotice');
        const closeNotice = document.getElementById('closeNotice');

        // Menambahkan event listener untuk tombol close
        closeNotice.addEventListener('click', () => {
            tipsNotice.style.display = 'none'; // Menghilangkan notice saat tombol diklik
        }); 
        // Fungsi untuk mengompres gambar menggunakan canvas
        function compressImage(file, maxSizeKB, callback) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const img = new Image();
                img.src = event.target.result;
    
                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
    
                    // Mengatur ukuran canvas sesuai dengan ukuran gambar asli
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);
    
                    // Mengatur kualitas kompresi
                    let quality = 0.7;
                    let base64String = canvas.toDataURL('image/jpeg', quality);
                    let sizeInKB = Math.round((base64String.length * 3 / 4) / 1024);
    
                    // Lakukan kompresi bertahap sampai ukuran kurang dari maxSizeKB
                    while (sizeInKB > maxSizeKB) {
                        quality -= 0.05;
                        base64String = canvas.toDataURL('image/jpeg', quality);
                        sizeInKB = Math.round((base64String.length * 3 / 4) / 1024);
                    }
    
                    // Konversi hasil kompresi ke file blob dan panggil callback
                    fetch(base64String)
                        .then(res => res.blob())
                        .then(blob => {
                            const compressedFile = new File([blob], file.name, { type: 'image/jpeg' });
                            callback(compressedFile);
                        });
                };
            };
            reader.readAsDataURL(file);
        }
    
        // Preview gambar sebelum upload dengan kompresi
        document.getElementById('gambar').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const maxSizeKB = 2048;
    
            if (file && file.size / 1024 > maxSizeKB) {
                compressImage(file, maxSizeKB, function (compressedFile) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(compressedFile);
                    document.getElementById('gambar').files = dataTransfer.files;
    
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const preview = document.getElementById('previewImage');
                        preview.src = e.target.result;
                        preview.style.width = '100%';
                        preview.style.height = '300px';
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(compressedFile);
                });
            } else {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('previewImage');
                    preview.src = e.target.result;
                    preview.style.width = '100%';
                    preview.style.height = '300px';
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    
        // Validasi sebelum mengirim form
        document.getElementById('addContentForm').addEventListener('submit', function (event) {
            const judulKonten = document.getElementById('judul_konten').value;
            const gambar = document.getElementById('gambar').files.length;
    
            if (!judulKonten || gambar === 0) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Semua kolom harus terisi!',
                    confirmButtonText: 'OK'
                });
            }
        });
    
        // Bersihkan form saat modal ditutup
        $('#addContentModal').on('hidden.bs.modal', function () {
            $('#judul_konten').val('');
            $('#gambar').val('');
            $('#previewImage').attr('src', '{{ asset("assets/img/emptyImage.png") }}');
        });
    
        $(document).on('click', '.edit-btn', function () {
        var id = $(this).data('id');
        var isi = $(this).data('isi');
        var gambar = $(this).data('gambar');

        $('#edit_judul_konten').val(isi);
        $('#previewEditImage').attr('src', gambar); // Tampilkan gambar lama
        $('#old_image').val(gambar.split('/').pop()); // Ambil nama file gambar lama

        // Update action URL form
        $('#editContentForm').attr('action', `{{ route('banner.update', '') }}/${id}`);
        $('#editContentModal').modal('show');

        previewEditImage.src = gambar; // Set the source to the existing image
        previewEditImage.style.width = '100%'; // Set the width to 100%
        previewEditImage.style.height = '300px'; // Set a fixed height
        previewEditImage.style.objectFit = 'contain'; // Maintain aspect ratio
    });

     document.getElementById('edit_gambar').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            const preview = document.getElementById('previewEditImage');
            preview.src = e.target.result;
            preview.style.width = '100%';
            preview.style.height = '300px';
            preview.style.display = 'block';
        }

        reader.readAsDataURL(file);
    });

    // Validasi sebelum mengirim form untuk Edit
    document.getElementById('editContentForm').addEventListener('submit', function (event) {
    const judulKonten = document.getElementById('edit_judul_konten').value;
    const gambar = document.getElementById('edit_gambar').files.length;
    const oldImage = document.getElementById('old_image').value;

    if (!judulKonten) {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Kolom isi harus terisi!',
            confirmButtonText: 'OK'
        });
    }
    // Jika gambar tidak diupload, pastikan oldImage terisi
    else if (gambar === 0 && !oldImage) {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Gambar lama harus ada!',
            confirmButtonText: 'OK'
        });
        }
    });
        $('#editContentModal').on('hidden.bs.modal', function () {
        $('#edit_judul_konten').val('');
        $('#edit_gambar').val('');
        $('#previewEditImage').attr('src', '');
    });
    $(document).on('click', '.delete-btn', function () {
    const button = $(this);
    const id = button.data('id');

    // SweetAlert konfirmasi
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: "Apakah Anda yakin ingin menghapus banner ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim form untuk menghapus
            button.closest('form').submit();
        }
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