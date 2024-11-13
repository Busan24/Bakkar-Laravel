<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layout.main')
@section('content')
<h2 class="text-4xl font-bold">Konten</h2>
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
                Tambahkan Konten
            </a>
        </div>

        <!-- Modal Tambah Konten -->
        <div class="modal fade" id="addContentModal" tabindex="-1" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addContentForm" action="{{ route('konten.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContentModalLabel">Tambahkan Konten</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="judul_konten">Judul</label>
                                <input type="text" class="form-control" id="judul_konten" name="judul_konten" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_konten">Link Youtube</label>
                                <textarea class="form-control" id="isi_konten" name="isi_konten" required></textarea>
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
                    <form id="editContentForm" action="" method="POST">
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
                                <label for="edit_judul_konten">Judul</label>
                                <input type="text" class="form-control" id="edit_judul_konten" name="judul_konten" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_isi_konten">Link Youtube</label>
                                <textarea class="form-control" id="edit_isi_konten" name="isi_konten" required></textarea>
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
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Link Youtube</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($konten as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">{{ $loop->iteration }}</td> <!-- Menampilkan nomor urut -->
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $item->judul_konten }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $item->isi_konten }}</td>
                            <td class="py-4 text-center">
                                <div class="flex space-x-2">
                                    <!-- Tombol Edit -->
                                    <a href="javascript:void(0)" 
                                    class="edit-btn text-white px-4 rounded hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 flex items-center transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                    hover:shadow-soft-2xl hover:scale-102" 
                                    style="background-color: #fb923c; height: 28px;margin-left: 20px;" 
                                    data-id="{{ $item->id }}" data-judul="{{ $item->judul_konten }}" data-isi="{{ $item->isi_konten }}">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('konten.destroy', $item->id) }}" method="POST" class="inline deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                            style="background-color: red; margin-left: 5px;" class="text-white py-1 px-3 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 flex items-center delete-btn transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                            hover:shadow-soft-2xl hover:scale-102" 
                                            data-id="{{ $item->id }}">
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




<!-- Script untuk validasi form sebelum submit -->
<script>
    $(document).ready(function() {
        // Ambil semua judul konten yang ada dan ubah menjadi lowercase
        var existingTitles = [];
        @foreach($konten as $item)
            existingTitles.push("{{ $item->judul_konten }}".toLowerCase());
        @endforeach

        // Fungsi untuk memeriksa apakah input adalah URL yang valid
        function isValidURL(url) {
            var pattern = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/;
            return pattern.test(url);
        }

        // Validasi form tambah konten
        document.getElementById('addContentForm').addEventListener('submit', function(e) {
            var judul = document.getElementById('judul_konten').value.toLowerCase();
            var isi = document.getElementById('isi_konten').value;

            // Cek apakah judul sudah ada (case insensitive)
            if (existingTitles.includes(judul)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Duplikat!',
                    text: 'Konten sudah ada. Silakan gunakan konten lain.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            // Cek apakah link valid
            if (!isValidURL(isi)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Link Tidak Valid!',
                    text: 'Mohon masukkan link Youtube yang valid.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            // Cek apakah semua kolom diisi
            if (!judul || !isi) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Semua kolom harus diisi!',
                    confirmButtonColor: '#d33',
                });
            }
        });

        // Edit Data Konten
        var originalTitle = ""; // Variable to store the original title

        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var isi = $(this).data('isi');

            // Set the original title when opening the edit modal
            originalTitle = judul.toLowerCase();

            $('#editContentModal').modal('show');
            $('#edit_judul_konten').val(judul);
            $('#edit_isi_konten').val(isi);
            $('#editContentForm').attr('action', '/konten/' + id);
        });

        document.getElementById('editContentForm').addEventListener('submit', function(e) {
            var judul = document.getElementById('edit_judul_konten').value.toLowerCase();
            var isi = document.getElementById('edit_isi_konten').value;

            // Cek apakah judul sudah ada (abaikan huruf kapital) dan bukan judul aslinya
            if (judul !== originalTitle && existingTitles.includes(judul)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Duplikat!',
                    text: 'Konten sudah ada. Silakan gunakan konten lain.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            // Cek apakah link valid
            if (!isValidURL(isi)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Link Tidak Valid!',
                    text: 'Mohon masukkan link Youtube yang valid.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            // Cek apakah semua kolom diisi
            if (!judul || !isi) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Form Tidak Lengkap!',
                    text: 'Mohon isi semua kolom.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            // Jika validasi berhasil, perbarui `existingTitles`
            existingTitles = existingTitles.filter(title => title !== originalTitle); // Hapus judul lama
            existingTitles.push(judul); // Tambahkan judul baru
        });

        // Hapus Data Konten
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
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

        // Kosongkan input saat modal ditutup
        $('#addContentModal').on('hidden.bs.modal', function() {
            $('#judul_konten').val('');
            $('#isi_konten').val('');
        });

        $('#editContentModal').on('hidden.bs.modal', function() {
            $('#edit_judul_konten').val('');
            $('#edit_isi_konten').val('');
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
