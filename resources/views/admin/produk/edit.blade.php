<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Edit Produk</title>

<!-- Custom fonts for this template -->
{{-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">


<!-- Custom styles for this template -->
<link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">



<!-- Custom styles for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
{{-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}


@extends('layout.main')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
    
        .card {
            border-radius: 10px;
        }
    
        .card-header {
            background-color: #343a40;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    
        .btn-custom {
            border-radius: 50px;
        }
    
        .form-control {
            border-radius: 5px;
        }
    
        .container {
            max-width: 800px;
        }
    
        .form-group img {
            max-width: 100%;
            height: auto;
        }
    
         .upload-box {
                width: 100px;
                height: 100px;
                border: 2px dashed #ccc;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                cursor: pointer;
                overflow: hidden; /* To ensure the image fits within the box */
            }
            .upload-box img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: none; /* Hidden by default */
            }
            .upload-box::before {
                content: '+';
                font-size: 2em;
                color: #ccc;
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .upload-box img.uploaded {
                display: block; /* Show the image when it is uploaded */
            }
    
            .file-inputs-container {
                display: flex;
                flex-wrap: wrap;
                gap: 10px; /* Spacing between boxes */
            }
    </style>

        <h3 class="ml-6">Edit Data Produk</h3>
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT') <!-- Metode PUT untuk update data -->
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Nama Produk</label>
                                                        <input type="text" class="form-control" id="name" name="nama-produk" value="{{ $product->name }}" required>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="kategori_produk">Kategori Produk</label>
                                                        <select name="kategori_produk" class="form-control">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="deskripsi_produk">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" name="deskripsi-produk" rows="3" required>{{ $product->description }}</textarea>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="harga_produk">Harga</label>
                                                        <input type="number" class="form-control" name="harga-produk" id="harga" value="{{ number_format($product->price, 0, '', '') }}" required>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gambar_produk">Gambar Produk</label>
                                                        
                                                        <!-- Input file untuk gambar baru -->
                                                        <input type="file" name="gambar_produk" id="gambar_produk" class="form-control-file mt-1" accept="image/*" onchange="previewImage(event)">
                                                        
                                                        <!-- Menyertakan gambar lama yang disimpan di database sebagai hidden field -->
                                                        <input type="hidden" name="old_gambar_produk" value="{{ $product->photo }}">
                                                        
                                                        <!-- Tempat untuk menampilkan gambar baru yang dipilih -->
                                                        <div id="new-image-preview" style="margin-top: 10px;"></div>
                                                    
                                                        <!-- Menampilkan gambar lama jika ada -->
                                                        @if ($product->photo)
                                                            <div id="current-image-container" class="image-preview-container" style="max-width: 300px; max-height: 200px; overflow: hidden;">
                                                                <img id="current-image" src="{{ asset('storage/' . $product->photo) }}" alt="Gambar Produk" class="img-fluid mt-2" style="width: 100%; height: auto; object-fit: contain;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="flex space-x-4">
                                                <button type="submit" class="inline-block px-5 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102" style="background-color: #fb923c;">
                                                    <i class="fas fa-save"></i> Save
                                                </button>
                                        
                                                <a href="{{ route('produk') }}" class="ml-2 inline-block px-4 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102" style="background-color: #adb5bd;">
                                                    <i class="fas fa-times"></i> Cancel
                                                </a>
                                            </div>
                                        </form>
                                        
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
    
        </div>

        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('library/jquery-easing/jquery.easing.min.js') }}"></script>
    
        <!-- Custom scripts for all pages-->
        {{-- <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('assets/js/post_create.js') }}"></script> --}}
        <script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
        <script src="{{ asset('assets/js/keamanan.js') }}"></script>
                
        <script>
            function validatePriceInput() {
            const hargaInput = document.getElementById('harga');
            let hargaValue = hargaInput.value.trim();

            // Hapus semua karakter selain angka
            const validHargaValue = hargaValue.replace(/[^0-9]/g, '');
            const hargaAngka = parseInt(validHargaValue, 10);

            // Batasi harga maksimal 500,000
            if (hargaAngka > 500000) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Harga Melebihi Batas',
                    text: 'Pastikan nominal harga di bawah 500,000.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
                hargaInput.value = '';
                return false;
            }

            hargaInput.value = validHargaValue;
            return true;
        }
        // Menambahkan event listener untuk memvalidasi input harga sebelum submit
        document.getElementById('harga').addEventListener('input', validatePriceInput);

       // Fungsi validasi form sebelum submit
            function validateForm(event) {
                event.preventDefault(); // Mencegah submit form langsung
        
                // Ambil nilai setiap field
                const namaProduk = document.getElementById('name').value.trim();
                const kategoriProduk = document.querySelector('select[name="kategori_produk"]').value;
                const deskripsiProduk = document.getElementById('deskripsi').value.trim();
                const hargaProduk = document.getElementById('harga').value.trim();
                const gambarProduk = document.getElementById('gambar_produk').files.length;
                const oldGambarProduk = document.querySelector('input[name="old_gambar_produk"]').value;
        
                // Array untuk menyimpan pesan error
                let errorMessages = [];
        
                // Validasi setiap field dan tambahkan pesan error jika field kosong
                if (!namaProduk) {
                    errorMessages.push("Nama produk harus diisi.");
                }
        
                if (!kategoriProduk) {
                    errorMessages.push("Kategori produk harus dipilih.");
                }
        
                if (!deskripsiProduk) {
                    errorMessages.push("Deskripsi produk harus diisi.");
                }
        
                // Validasi harga produk, pastikan hanya berupa angka positif
                if (!hargaProduk) {
                    errorMessages.push("Harga produk harus diisi.");
                } else if (isNaN(hargaProduk) || parseFloat(hargaProduk) <= 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Harga Tidak Valid',
                        text: 'Harga produk harus berupa angka positif lebih dari 0.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }

                // Gambar tidak wajib diunggah jika gambar lama masih ada
                if (gambarProduk === 0 && !oldGambarProduk) {
                    errorMessages.push("Gambar produk harus diunggah.");
                }

                // Jika ada error, tampilkan SweetAlert2 dan hentikan proses submit
                if (errorMessages.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessages.join("\n"),
                    });
                    return false;
                }
        
                // Jika validasi lolos, submit form
                event.target.submit();
            }
        
            // Fungsi untuk menampilkan pratinjau gambar baru
            function previewImage(event) {
                const newImagePreview = document.getElementById('new-image-preview');
                const currentImageContainer = document.getElementById('current-image-container');
        
                // Hapus gambar lama jika ada gambar baru yang dipilih
                if (currentImageContainer) {
                    currentImageContainer.remove(); // Menghapus elemen gambar lama
                }
        
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
        
                    reader.onload = function () {
                        newImagePreview.innerHTML = `
                            <div id="current-image-container" class="image-preview-container" style="max-width: 300px; max-height: 200px; overflow: hidden;">
                                <img src="${reader.result}" alt="Gambar Baru" class="img-fluid mt-2" style="width: 100%; height: auto; object-fit: contain;">
                            </div>
                        `;
                    };
        
                    reader.readAsDataURL(file);
                }
            }
        
            // Fungsi untuk kompres gambar
            function compressImage(file, callback) {
                const MAX_WIDTH = 2048;  // Batas lebar gambar
                const MAX_HEIGHT = 2048; // Batas tinggi gambar
        
                const img = new Image();
                const reader = new FileReader();
        
                reader.onload = function (e) {
                    img.src = e.target.result;
                };
        
                img.onload = function () {
                    // Tentukan rasio pengurangan gambar
                    let width = img.width;
                    let height = img.height;
        
                    if (width > MAX_WIDTH || height > MAX_HEIGHT) {
                        const ratio = Math.min(MAX_WIDTH / width, MAX_HEIGHT / height);
                        width = width * ratio;
                        height = height * ratio;
                    }
        
                    // Buat canvas untuk menggambar gambar yang sudah dikompres
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = width;
                    canvas.height = height;
        
                    // Gambar gambar ke dalam canvas
                    ctx.drawImage(img, 0, 0, width, height);
        
                    // Simpan gambar hasil kompresi sebagai base64
                    canvas.toBlob(function (blob) {
                        callback(blob);
                    }, 'image/jpeg', 0.7);  // Anda bisa menyesuaikan kualitas kompresi
                };
        
                reader.readAsDataURL(file);  // Mulai membaca file gambar
            }
        
            // Fungsi untuk menangani gambar baru yang dipilih dan menampilkan gambar pratinjau
            document.getElementById('gambar_produk').addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    // Cek jika ada gambar baru
                    compressImage(file, function (compressedBlob) {
                        // Tampilkan gambar pratinjau
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const newImagePreview = document.getElementById('new-image-preview');
                            newImagePreview.innerHTML = `
                                <div class="image-preview-container" style="max-width: 300px; max-height: 200px; overflow: hidden;">
                                    <img src="${e.target.result}" alt="Gambar Baru" class="img-fluid mt-2" style="width: 100%; height: auto; object-fit: contain;">
                                </div>
                            `;
        
                            // Update input file dengan gambar yang sudah dikompres
                            const compressedFile = new File([compressedBlob], file.name, { type: 'image/jpeg' });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(compressedFile);  // Masukkan file yang sudah dikompres ke dalam DataTransfer
                            document.getElementById('gambar_produk').files = dataTransfer.files;  // Update input file
                        };
                        reader.readAsDataURL(compressedBlob);  // Tampilkan pratinjau gambar yang dikompres
                    });
                }
            });
        
            // Tambahkan event listener pada tombol submit
            document.querySelector('form').addEventListener('submit', validateForm);
            
            // Tambahkan event listener untuk gambar baru
            document.getElementById('gambar_produk').addEventListener('change', previewImage);
        </script>
        @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Memperbarui Produk',
                text: '{{ session('error') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
            });
        </script>
    @endif
        
@endsection