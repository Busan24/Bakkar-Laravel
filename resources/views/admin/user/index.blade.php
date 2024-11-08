<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

@extends('layout.main')

@section('content')
<!-- cards -->
    <h2>Admin</h2>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border" style="margin-top: 20px">
        <div class="ml-2 mt-2 pb-0 mb-0 bg-white rounded-t-2xl">       
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Password</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $user->email }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $user->name }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $user->password }}</td> <!-- Jangan tampilkan password di UI -->
                            <td class="py-4 text-center">
                                <div class="flex space-x-2">
                                    {{-- <!-- Tombol Edit -->
                                    <a href="" 
                                        style="background-color: #fb923c; height: 28px;" class="text-white px-4 rounded hover:bg-orange-600 focus:outline-none focus:ring focus:ring-orange-300 flex items-center transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                        hover:shadow-soft-2xl hover:scale-102">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                 --}}
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('user_delete', $user->id) }}" method="POST" id="deleteForm{{ $user->id }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                            style="background-color: red; margin-left: 5px;" class="text-white py-1 px-3 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 flex items-center delete-btn transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro  
                                                    hover:shadow-soft-2xl hover:scale-102" 
                                                    data-id="{{ $user->id }}">
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
            
<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('library/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            const userId = $(this).data('id'); // ambil ID pengguna dari data-id
            const deleteForm = $('#deleteForm' + userId); // ambil formulir hapus yang sesuai
            const currentUserId = "{{ Auth::id() }}"; // ambil ID pengguna yang sedang login

            // Cek apakah user yang ingin dihapus adalah user yang sedang login
            if (userId == currentUserId) {
                Swal.fire({
                    title: 'Anda mencoba menghapus akun Anda sendiri!',
                    text: 'Menghapus akun ini akan segera mengeluarkan Anda.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete and logout!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit(); // submit formulir jika dikonfirmasi
                    }
                });
            } else {
                // Jika akun yang ingin dihapus bukan akun yang sedang login
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit(); // submit formulir jika dikonfirmasi
                    }
                });
            }
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
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endif

@endsection