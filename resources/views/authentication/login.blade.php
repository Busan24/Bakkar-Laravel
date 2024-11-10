@include('layout.auth.link') 
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" type="image/png" href="{{ asset('assets/img/logo_bakkar.png') }}" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div class="flex justify-center">
        <div class="flex justify-center">
          <a href="{{ route('home') }}"> <!-- Tambahkan ini -->
              <img src="{{ asset('assets/img/logo-bakkar.png') }}" class="inline h-16 w-auto max-w-full transition-all duration-200 ease-nav-brand" alt="main_logo" />
          </a> <!-- Dan tutup tag di sini -->
      </div>
      
    </div>

      <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" id="loginForm" action="{{ route('login') }}">
            @csrf        
          <div>
            <label class="block font-medium text-sm text-gray-700 mb-1" for="email"> Email </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Email Anda" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username" />
          </div>
  
          <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="password"> Password </label>
            <input class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full" placeholder="Masukkan Password Anda" id="password" type="password" name="password" required="required" autocomplete="current-password" />
          </div>
  
          <div class="mt-4">
            <label for="remember_me" class="flex items-center">
              <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" id="remember_me" name="remember" required="required"/>
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>
  
          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-orange-400 hover:bg-orange-600 focus:outline-none">
                Login
              </button>
          </div>
          <p class="mt-2 text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-orange-400 hover:underline ml-1 whitespace-nowrap font-semibold">Register here</a></p>
        </form>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Validate form before submission
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        // Validate email
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email.match(emailRegex)) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Email format is invalid!',
                confirmButtonColor: '#d33',
            });
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate password length
        if (password.length < 8) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                title: 'Password minimal 8 characters',
                confirmButtonColor: '#d33',
            });
            event.preventDefault(); // Prevent form submission
            return;
        }
    });
</script>
@if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#d33',
                    });
                </script>
@endif
@include('layout.partial.script')