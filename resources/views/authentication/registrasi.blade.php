<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-bakkar.png') }}" />
    <title>Registrasi</title>
</head>

@include('layout.auth.link') 
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div class="flex justify-center">
        <a href="{{ route('home') }}"> <!-- Tambahkan ini -->
            <img src="{{ asset('assets/img/logo-bakkar.png') }}" class="inline h-16 w-auto max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo" />
        </a> <!-- Dan tutup tag di sini -->
    </div>
  
      <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
          <div>
            <label class="block font-medium text-sm text-gray-700 mb-1" for="email"> Email </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Email Anda" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username" />
          </div>
  
          <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="name"> Nama </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Nama Anda" id="name" type="text" name="name" required="required" autocomplete="name" />
          </div>
  
          <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="password"> Password </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Password Anda" id="password" type="password" name="password" required="required" autocomplete="current-password" />
          </div>
  
          <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="confirm_password"> Konfirmasi Password </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Konfirmasi Password Anda" id="password_confirmation" type="password" name="password_confirmation" required="required" autocomplete="new-password"  required/>

          </div>
  
          <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="terms">
              <div class="flex items-center">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" id="terms" required="required" />
                <div class="ml-2">I agree to the <a  class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a></div>
              </div>
            </label>
          </div>
  
          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="w-full py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-orange-400 hover:bg-orange-600 focus:outline-none">
                Registrasi
              </button>
          </div>
          <p class="text-gray-800 text-sm mt-6 text-center">Already have an account? <a href="{{ route('login') }}" class="text-orange-400 font-semibold hover:underline ml-1">Login here</a></p>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;
        const name = document.getElementById('name').value;

        // Validasi email harus mengandung '@'
        if (!email.includes('@')) {
            Swal.fire({
                icon: 'warning',
                title: 'Invalid Email',
                text: 'Menggunakan Email yang benar',
            });
            return;
        }

        // Validasi password minimal 8 karakter
        if (password.length < 8) {
            Swal.fire({
                icon: 'warning',
                title: 'Password minimal 8 characters',
                confirmButtonColor: '#d33',
            });
            return;
        }

        // Validasi confirm password harus sama
        if (password !== passwordConfirmation) {
            Swal.fire({
                icon: 'warning',
                text: 'Kata sandi dan konfirmasi kata sandi harus sama',
                confirmButtonColor: '#d33'
            });
            return;
        }

        // Validasi semua field harus diisi
        if (!email || !password || !passwordConfirmation || !name) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete Form',
                text: 'Semua Kolom Harus di Isi',
                confirmButtonColor: '#d33'
            });
            return;
        }

        // Jika semua validasi berhasil, lanjutkan proses submit melalui AJAX
        const formData = new FormData(this);

        fetch('{{ route('register') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Registrasi Gagal',
                    text: 'Akun Sudah Terdaftar!',
                    confirmButtonColor: '#d33', // Tampilkan pesan error dari server
                });
            } else if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Berhasil',
                    text: 'Silahkan Login',
                    confirmButtonColor: '#0D92F4',
                }).then(() => {
                    // Redirect ke halaman login atau dashboard
                    window.location.href = '/login';
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan. Silakan coba lagi.',
            });
        });
    });
</script>

  
  @include('layout.partial.script')
  @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
