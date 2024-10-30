@php
    // Mendapatkan nama rute saat ini
    $routeName = optional(request()->route())->getName();
    // Menentukan judul berdasarkan nama rute
    $pageTitle = match ($routeName) {
        'produk' => 'Produk',
        'user' => 'User',
        'create' => "Tambah Data Produk",
        'edit' => "Edit Data Produk",
        'category' => "Kategori Produk",
        'editprofile' => 'Edit Profile',
        'konten' => 'Konten',
        'banner' => 'Bannner',
        // default => 'Dashboard', // Mengatur default title jika tidak ada kecocokan
    };
@endphp

<!-- sidenav  -->
  <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
              <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{{ $pageTitle }}</li>
          </ol>
          {{-- <h6 class="mb-0 font-bold capitalize">Dashboard</h6> --}}
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
            {{-- <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
              <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                <i class="fas fa-search"></i>
              </span>
              <input type="text" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
            </div> --}}
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
              <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
            </li> -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle text-sm font-semibold transition-all ease-nav-brand text-slate-500" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg"
                       alt="avatar image"
                       class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-circle"/>
                  {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <div class="px-3 py-1">
                      <span class="block text-sm">{{ Auth::user()->name }}</span>
                      <span class="block text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  {{-- <button class="dropdown-item" type="button" onclick="location.href='{{ route('editprofile', Auth::user()->id) }}'">Edit Profile</button> --}}
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="dropdown-item" type="submit">Log Out</button>
                  </form> 
              </div>
          </li>
          
    
          <li class="flex items-center pl-4 xl:hidden">
            <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" sidenav-trigger>
              <div class="w-4.5 overflow-hidden">
                <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
              </div>
            </a>
          </li>
          {{-- <li class="flex items-center px-4">
            <a href="javascript:;" class="p-0 text-sm transition-all ease-nav-brand text-slate-500">
              <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
              <!-- fixed-plugin-button-nav  -->
            </a>
          </li> --}}
        
          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->
<script>
//   document.querySelector('[sidenav-trigger]').addEventListener('click', function () {
//     console.log('Sidenav trigger clicked');
//     const sidebar = document.querySelector('aside');
//     sidebar.classList.toggle('-translate-x-full');
// });

  
  document.getElementById('userDropdown').addEventListener('click', function() {
    var dropdownMenu = document.getElementById('dropdown');
    dropdownMenu.classList.toggle('hidden');
});

</script>