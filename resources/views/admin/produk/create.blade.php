<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Tambah Produk</title>
<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>
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

        <h3 class="ml-6">Tambah Data Produk</h3>
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
                                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Nama Produk</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama Produk" name="nama-produk" required>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label>Kategori Produk</label>
                                                        <select name="kategori_produk" class="form-control">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" name="deskripsi-produk" rows="3" placeholder="Masukkan Deskripsi Produk" required></textarea>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input type="number" class="form-control" name="harga-produk" id="harga" placeholder="Masukkan Harga Produk" required>
                                                    </div>
                                                </div>
                                    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gambar_produk">Gambar</label>
                                                        <input type="file" class="form-control-file mb-3" id="gambar_produk" name="gambar_produk" accept="image/png, image/jpeg" required>
                                                        
                                                        <!-- Tempatkan img untuk pratinjau gambar dengan aturan CSS responsif -->
                                                        <div class="image-preview-container" style="max-width: 300px; max-height: 200px; overflow: hidden;">
                                                            <img id="image-preview" src="{{ asset('assets/img/emptyImage.png') }}" alt="Pratinjau Gambar" class="img-fluid mt-2" style="width: 100%; height: auto; object-fit: contain;">
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                 
                                                
                                        
                                                <div class="flex justify-end space-x-4">
                                                    <!-- Tombol Save -->
                                                    <button type="submit" class="inline-block px-5 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102" style="background-color: #fb923c; margin-left:14px;">
                                                        <i class="fas fa-save"></i> Save
                                                    </button>
                                                
                                                    <!-- Tombol Cancel -->
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
        
                if (gambarProduk === 0) {
                    errorMessages.push("Gambar produk harus diunggah.");
                }
        
                // Jika ada error, tampilkan SweetAlert2 dan hentikan proses submit
                if (errorMessages.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessages.join("\n")
                    });
                    return false;
                }
        
                // Jika validasi lolos, submit form
                event.target.submit();
            }
        
            // Fungsi untuk menampilkan pratinjau gambar dan kompresi jika ukuran lebih dari 2MB
            document.getElementById('gambar_produk').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const maxSize = 2048 * 1024; // 2MB dalam byte
                const imagePreview = document.getElementById('image-preview');
        
                if (file) {
                    if (file.size > maxSize) {
                        compressImage(file, 0.7, function(compressedFile) {
                            // Update input file dengan hasil kompresi
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(compressedFile);
                            document.getElementById('gambar_produk').files = dataTransfer.files;
        
                            // Tampilkan pratinjau gambar terkompresi
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                            };
                            reader.readAsDataURL(compressedFile);
                        });
                    } else {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
        
            // Fungsi kompresi gambar dengan kualitas dinamis
            function compressImage(file, maxSize, callback) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(event) {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0, img.width, img.height);
        
                        let quality = 0.9; // Mulai dari kualitas tinggi
                        let compressedFile = null;
        
                        // Coba kompresi dengan kualitas yang menurun sampai mencapai ukuran yang diinginkan
                        function tryCompress() {
                            canvas.toBlob(function(blob) {
                                compressedFile = new File([blob], file.name, { type: file.type, lastModified: Date.now() });
                                if (compressedFile.size > maxSize && quality > 0.2) {
                                    quality -= 0.05; // Menurunkan kualitas
                                    tryCompress();
                                } else {
                                    callback(compressedFile);
                                }
                            }, file.type, quality);
                        }
        
                        tryCompress();
                    };
                };
            }
        
            // Fungsi untuk validasi harga agar hanya menerima angka
            document.getElementById('harga').addEventListener('input', function(event) {
                const hargaInput = event.target;
                const value = hargaInput.value;
        
                // Hapus karakter yang bukan angka atau koma
                const validValue = value.replace(/[^0-9]/g, '');
        
                if (value !== validValue) {
                    // Jika ada karakter selain angka, peringatkan pengguna
                    Swal.fire({
                        icon: 'warning',
                        title: 'Harga Tidak Valid',
                        text: 'Harga hanya boleh berupa angka.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
        
                // Perbarui nilai input untuk hanya mengandung angka
                hargaInput.value = validValue;
            });
        
            // Tambahkan debounce pada submit form
            function debounce(func, delay) {
                let inDebounce;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(inDebounce);
                    inDebounce = setTimeout(() => func.apply(context, args), delay);
                };
            }
        
            // Event listener untuk tombol submit
            document.querySelector('form').addEventListener('submit', debounce(function(event) {
                validateForm(event);
            }, 1000));
        
            document.querySelector('form').addEventListener('submit', function(event) {
                const submitButton = event.target.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerHTML = 'Saving...';
            });
        </script>
        
        

@if (session('error'))
    <script>
        if (performance.navigation.type === performance.navigation.TYPE_BACK_FORWARD) {
            // Jika user kembali menggunakan tombol back browser, jangan tampilkan alert
            console.log("Notifikasi sukses tidak akan ditampilkan karena kembali dari cache.");
        } else {
            // Tampilkan notifikasi jika halaman dimuat normal
                Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        }
    </script>
@endif
          
@endsection