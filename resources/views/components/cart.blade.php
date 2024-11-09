<div id="cartModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
      <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Pesanan Kamu</h2>
        <!-- Cart Items -->
        <div id="cartItems" class="space-y-4"></div>
        <div class="mt-6 flex justify-between items-center">
          <span id="totalPrice" class="font-bold text-lg">Total: 0K</span>
          <button onclick="checkout()" class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-300">Checkout</button>
        </div>
      </div>
      <button onclick="toggleCart()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
  </div>