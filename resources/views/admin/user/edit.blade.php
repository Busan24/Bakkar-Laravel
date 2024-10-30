@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="font-sans text-gray-900 antialiased">
    <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <!-- Form Edit Profil -->
        <form method="POST" action="{{ route('user.update', Auth::user()->id) }}" id="editForm">
            @csrf
            @method('PUT')

            <!-- Input Email -->
            <div>
                <label class="block font-medium text-sm text-gray-700 mb-1" for="email">Email</label>
                <input value="{{ Auth::user()->email }}" class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" id="email" type="email" name="email" required />
            </div>

            <!-- Input Nama -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 mb-1" for="name">Nama</label>
                <input value="{{ Auth::user()->name }}" class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" id="name" type="text" name="name" required />
            </div>

            <!-- Input Password Lama -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 mb-1" for="password_lama">Password Saat Ini</label>
                <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" id="password_lama" type="password" name="password_lama" required />
            </div>

            <!-- Input Password Baru -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 mb-1" for="password_baru">Password Baru</label>
                <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" id="password_baru" type="password" name="password_baru" minlength="8" required />
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 mb-1" for="password_confirmation">Konfirmasi Password Baru</label>
                <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" id="password_confirmation" type="password" name="password_confirmation" required/>
            </div>

            <!-- Tombol Save -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="inline-block px-5 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102" style="background-color: #fb923c; margin-left:14px;">
                    <i class="fas fa-save"></i> Save
                </button>
                
                <a href="{{ route('user') }}" class="ml-2 inline-block px-4 py-2 my-4 text-sm font-bold text-center text-white align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-140 bg-x-25 leading-pro hover:shadow-soft-2xl hover:scale-102" style="background-color: #adb5bd;">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let passwordBaru = document.getElementById('password_baru').value;
        let passwordConfirmation = document.getElementById('password_confirmation').value;

        if (passwordBaru.length < 8) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Password baru minimal 8 karakter.',
            });
            return;
        }

        if (passwordBaru !== passwordConfirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Konfirmasi password tidak sama dengan password baru.',
            });
            return;
        }

        this.submit();
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',
        });
    </script>
@endif


@endsection
