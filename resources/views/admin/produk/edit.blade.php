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
                                                        <input type="number" class="form-control" name="harga-produk" id="harga" value="{{ $product->price }}" required>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                        <label for="Whatsapp">Whatsapp</label>
                                                        <textarea class="form-control" id="whatsapp" name="Whatsapp-produk" rows="3" required>{{ $product->whatsapp }}</textarea>
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
    
        <!-- Logout Modal-->
        {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div> --}}
        
    
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
                
        <script>
            // Fungsi validasi form sebelum submit
            function validateForm(event) {
            event.preventDefault(); // Mencegah submit form langsung

            // Ambil nilai setiap field
            const namaProduk = document.getElementById('name').value.trim();
            const kategoriProduk = document.querySelector('select[name="kategori_produk"]').value;
            const deskripsiProduk = document.getElementById('deskripsi').value.trim();
            const hargaProduk = document.getElementById('harga').value.trim();
            const whatsappProduk = document.getElementById('whatsapp').value.trim();
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

            if (!whatsappProduk) {
                errorMessages.push("Nomor WhatsApp harus diisi.");
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

        
            // Fungsi untuk menampilkan pratinjau gambar dan menyesuaikan ukurannya
            document.getElementById('gambar_produk').addEventListener('change', function(event) {
                const file = event.target.files[0]; // Ambil file gambar yang dipilih
                const imagePreview = document.getElementById('image-preview');  // Gambar pratinjau
        
                if (file) {
                    const reader = new FileReader();
        
                    // Ketika file selesai dimuat (onload), update pratinjau gambar
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;  // Update gambar pratinjau dengan data URL (base64)
                    };
        
                    // Membaca file sebagai data URL (base64) untuk pratinjau
                    reader.readAsDataURL(file);
                }
            });
        
            // Fungsi untuk menampilkan pratinjau gambar dan menyesuaikan ukurannya
            function previewImage(event) {
                const newImagePreview = document.getElementById('new-image-preview');
                const currentImageContainer = document.getElementById('current-image-container');
                
                // Hapus gambar lama jika ada gambar baru yang dipilih
                if (currentImageContainer && event.target.files.length > 0) {
                    currentImageContainer.style.display = 'none';
                }

                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function () {
                    newImagePreview.innerHTML = `
                    <div id="current-image-container" class="image-preview-container" style="max-width: 300px; max-height: 200px; overflow: hidden;">
                    <img src="${reader.result}" alt="Gambar Baru"  class="img-fluid mt-2" style="width: 100%; height: auto; object-fit: contain;"> 
                    </div>`;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }

            

            // Tambahkan event listener pada tombol submit
            document.querySelector('form').addEventListener('submit', validateForm);
            
            // Tambahkan event listener untuk gambar baru
            document.getElementById('gambar_produk').addEventListener('change', previewImage);
        </script>
        
                                
@endsection