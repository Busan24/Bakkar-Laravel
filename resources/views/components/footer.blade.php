<footer class="bg-gray-700 text-white py-8">
  <div class="container mx-auto flex flex-wrap justify-between items-start px-4">
    <!-- Logo -->
    <div class="mb-6">
      <h2 class="text-3xl font-bold font-sans">Bakkar Fried Chicken</h2>
    </div>

    <!-- Links -->
    <div class="mb-6">
      <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
      <ul class="space-y-2">
            <li><a href="{{ url('/') }}" class="hover:text-gray-900">Beranda</a></li>
            <li><a href="{{ url('/menu') }}" class="hover:text-gray-900">Menu</a></li>
            <li><a href="{{ url('/about') }}" class="hover:text-gray-900">Tentang Kami</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="mb-6">
      <h3 class="text-lg font-semibold mb-2">Kontak</h3>
      <p>Alamat: Jl. Raya No.123, Jakarta</p>
      <p>Email: info@bakkar.com</p>
      <p>Telepon: +62 812 3456 7890</p>
    </div>

    <!-- Social Media -->
    <div class="flex gap-1">
      <a href="https://www.instagram.com/bakkar.friedchicken?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" 
        class="flex items-center text-white hover:text-gray-400">
        <i class="fab fa-instagram mr-2"></i>
        <span>bakkar.friedchicken</span>
      </a>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="border-t border-gray-700 mt-8 pt-4 text-center">
    <p>&copy; 2024 Bakkar. All Rights Reserved.</p>
  </div>
</footer>