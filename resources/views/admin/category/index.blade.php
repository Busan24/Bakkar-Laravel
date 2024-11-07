<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

@extends('layout.main')
@section('content')
<!-- cards -->
    <h2>Category Produk</h2>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border" style="margin-top: 20px">
        <div class="ml-2 mt-2 pb-0 mb-0 bg-white rounded-t-2xl">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addCategoryModal"  class="inline-block inline-flex items-center justify-center px-2 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
            hover:shadow-soft-2xl hover:scale-102"  style="background-color: #fb923c">
                <!-- Ikon SVG sebelum teks tombol -->
                <svg class="inline-block w-4 h-4 mr-2 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292.377 292.377" xml:space="preserve">
                    <g>
                        <path d="M146.188,0C65.576,0,0,65.582,0,146.188s65.576,146.188,146.188,146.188
                            s146.188-65.582,146.188-146.188S226.801,0,146.188,0z M194.962,152.155h-42.806v42.8c0,3.3-2.667,5.967-5.967,5.967
                            c-3.3,0-5.967-2.667-5.967-5.967v-42.8H97.415c-3.294,0-5.967-2.673-5.967-5.967s2.673-5.967,5.967-5.967h42.806V97.415
                            c0-3.294,2.667-5.967,5.967-5.967c3.3,0,5.967,2.673,5.967,5.967v42.806h42.806c3.3,0,5.967,2.673,5.967,5.967
                            S198.261,152.155,194.962,152.155z"/>
                    </g>
                </svg>
                Tambahkan Category Produk
            </a>
        </div>
        
        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addCategoryForm" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryModalLabel">Tambahkan Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="color">Warna Kategori</label>
                                <input type="color" class="form-control" id="color" name="color" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" style="background-color: #fb923c" class="btn text-white hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 bg-orange-400 transition-all ease-in border-0 rounded-lg shadow-soft-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Kategori -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editCategoryForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="edit_nama_kategori" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_color">Warna Kategori</label>
                                <input type="color" class="form-control" id="edit_color" name="color" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" style="background-color: #fb923c" class="btn text-white hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 bg-orange-400 transition-all ease-in border-0 rounded-lg shadow-soft-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Warna</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">{{ $key + 1 }}</td> <!-- Menampilkan nomor urut -->
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4">
                                <span style="display: inline-block; width: 24px; height: 24px; background-color: {{ $category->color }}; border-radius: 4px;"></span>
                            </td>                                   
                            <td class="py-4 text-center">
                                <div class="flex space-x-2">
                                    <!-- Tombol Edit -->
                                    <a href="javascript:void(0)" 
                                    class="edit-btn text-white px-4 rounded hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 flex items-center transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                    hover:shadow-soft-2xl hover:scale-102" 
                                    style="background-color: #fb923c; height: 28px; margin-left: 20px;" 
                                    data-id="{{ $category->id }}" 
                                    data-name="{{ $category->name }}" 
                                    data-color="{{ $category->color }}"> <!-- Tambahkan data warna -->
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                        style="background-color: red; margin-left: 5px;" class="text-white py-1 px-3 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 flex items-center delete-btn transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                                hover:shadow-soft-2xl hover:scale-102" 
                                                data-id="{{ $category->id }}">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
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
        $(document).ready(function() {
        // Tambah Kategori Modal
        $('#addCategoryForm').on('submit', function(e) {
            var nama = $('#nama_kategori').val();

            if (!nama) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Semua kolom harus diisi!',
                });
            }
        });

        // Edit Kategori
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('name');
            var color = $(this).data('color'); // Ambil data warna

            $('#editCategoryModal').modal('show');
            $('#edit_nama_kategori').val(nama);
            $('#edit_color').val(color); // Set nilai warna di input color pada modal edit
            $('#editCategoryForm').attr('action', `{{ route('category.update', '') }}/${id}`);
        });


        // Validasi Form Edit
        $('#editCategoryForm').on('submit', function(e) {
            var nama = $('#edit_nama_kategori').val();

            if (!nama) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Semua kolom harus diisi!',
                });
            }
        });

        // Kosongkan input saat modal ditutup
        $('#addCategoryModal').on('hidden.bs.modal', function() {
            $('#nama_kategori').val('');
        });

        $('#editCategoryModal').on('hidden.bs.modal', function() {
            $('#edit_nama_kategori').val('');
        });

        // Menangani aksi delete category
        $('.delete-btn').on('click', function(event) {
            event.preventDefault(); // Mencegah aksi default tombol
            const form = $(this).closest('form');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Pada Produk yang memakai Category ini akan terhapus juga!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    </script>
    
    @if (session('success'))
    <script>
        if (performance.navigation.type === performance.navigation.TYPE_BACK_FORWARD) {
            // Jika user kembali menggunakan tombol back browser, jangan tampilkan alert
            console.log("Notifikasi sukses tidak akan ditampilkan karena kembali dari cache.");
        } else {
            // Tampilkan notifikasi jika halaman dimuat normal
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33',
        });
    </script>
    @endif

@endsection
