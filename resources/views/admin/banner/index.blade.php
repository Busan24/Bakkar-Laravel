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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Isi</th>
                        <th scope="col" class="px-6 py-3">Gambar</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $banner->isi_konten }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <img src="{{ asset('images/' . $banner->gambar) }}" alt="{{ $banner->isi_konten }}" class="w-24 h-24 object-cover">
                        </td>
                        <td class="py-4 text-center">
                            <div class="flex space-x-2">
                                <!-- Tombol Edit -->
                                    <a href="javascript:void(0)" 
                                    class="edit-btn text-white px-4 rounded hover:bg-orange-600 flex items-center transition-all" 
                                    style="background-color: #fb923c; height: 28px;margin-left: 20px;" 
                                    data-id="{{ $banner->id }}"
                                    data-isi="{{ $banner->isi_konten }}"
                                    data-gambar="{{ asset('images/' . $banner->gambar) }}">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" class="inline deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                        style="background-color: red; margin-left: 5px;" class="text-white py-1 px-3 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 flex items-center delete-btn transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                        hover:shadow-soft-2xl hover:scale-102" 
                                        data-id="{{ $banner->id }}">
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
        // Preview gambar sebelum upload
        document.getElementById('gambar').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function (e) {
                const preview = document.getElementById('previewImage');
                preview.src = e.target.result;
                preview.style.width = '100%';  // Set to match the dimensions of emptyImage.png
                preview.style.height = '300px'; // Set to match the dimensions of emptyImage.png
                preview.style.display = 'block'; // Tampilkan gambar
            }
            
            reader.readAsDataURL(file);
        });

        // Validasi sebelum mengirim form
        document.getElementById('addContentForm').addEventListener('submit', function (event) {
            // Mengambil nilai dari input
            const judulKonten = document.getElementById('judul_konten').value;
            const gambar = document.getElementById('gambar').files.length;

            // Memeriksa apakah semua kolom terisi
            if (!judulKonten || gambar === 0) {
                event.preventDefault(); // Mencegah pengiriman form
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
            // Reset input teks
            $('#judul_konten').val('');
            // Reset input file
            $('#gambar').val('');
            // Kembalikan preview gambar ke gambar default
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
        position: 'center',
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
    });
    
</script>
@endif  

@endsection