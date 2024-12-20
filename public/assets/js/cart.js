// Ambil cart dari localStorage atau inisialisasi dengan array kosong
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to toggle cart modal visibility
function toggleCart() {
  const cartModal = document.getElementById("cartModal");
  cartModal.classList.toggle("hidden");
  displayCart();
}

// Function to add items to the cart
function addToCart(name, description, price, productId) {
  const item = cart.find(item => item.name === name);
  
  if (item) {
    item.quantity++;
  } else {
    cart.push({ name, description, price, quantity: 1 });
  }

  updateCart(); // Update localStorage
  displayCart();
  
  // Tampilkan animasi pada tombol "Pesan Pickup"
  const button = document.getElementById(`pesan-btn-${productId}`);
  button.classList.add('bg-green-500', 'animate-bounce');
  button.textContent = 'Ditambahkan';
  setTimeout(() => {
      button.classList.remove('bg-green-500', 'animate-bounce');
      button.textContent = 'Pesan Pickup';
  }, 1000);

  // Perbarui jumlah produk di ikon keranjang
  updateCartCount();
}

// Function to update cart count icon
function updateCartCount() {
  const cartCount = document.getElementById('cart-count');
  const count = cart.length;

  if (count > 0) {
    cartCount.textContent = count;
    cartCount.classList.remove('hidden');
  } else {
    cartCount.classList.add('hidden');
  }
}

// Function to display cart items
function displayCart() {
  const cartItems = document.getElementById("cartItems");
  cartItems.innerHTML = "";
  let total = 0;

  cart.forEach((item, index) => {
    total += item.price * item.quantity;
    cartItems.innerHTML += `
      <div class="flex items-center justify-between">
        <div>
          <p class="font-semibold">${item.name}</p>
          <p class="text-sm text-gray-600">${item.description}</p>
        </div>
        <div>
          <button onclick="decreaseQuantity(${index})" class="text-yellow-500 px-2">-</button>
          <span class="text-gray-700 px-2">${item.quantity} x ${(item.price) / 1000}K</span>
          <button onclick="increaseQuantity(${index})" class="text-yellow-500 px-2">+</button>
          <button onclick="removeFromCart(${index})" class="text-red-500 ml-2">Remove</button>
        </div>
      </div>
    `;
  });

  document.getElementById("totalPrice").innerText = `Total: ${total / 1000}K`;
}

// Function to remove an item from the cart
function removeFromCart(index) {
  cart.splice(index, 1);
  updateCart(); // Update localStorage
  displayCart();
  updateCartCount(); // Update cart icon count
}

// Function to increase quantity of an item
function increaseQuantity(index) {
  cart[index].quantity += 1;
  updateCart(); // Update localStorage
  displayCart();
}

// Function to decrease quantity of an item
function decreaseQuantity(index) {
  if (cart[index].quantity > 1) {
    cart[index].quantity -= 1;
  } else {
    cart.splice(index, 1);
  }
  updateCart(); // Update localStorage
  displayCart();
  updateCartCount(); // Update cart icon count
}

// Function to update cart in localStorage
function updateCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to get greeting based on time of the day
function getGreeting() {
  const hour = new Date().getHours();
  if (hour < 11) return "pagi";
  else if (hour < 14) return "siang";
  else if (hour < 18) return "sore";
  else return "malam";
}

// Function to checkout and generate WhatsApp message
function checkout() {
  const cartModal = document.getElementById("cartModal");
  
  if (cart.length === 0) {
    // Sembunyikan cart modal sebelum menampilkan SweetAlert
    cartModal.classList.add("hidden");
    
    // Tampilkan SweetAlert jika keranjang kosong
    Swal.fire({
      icon: 'warning',
      title: 'Keranjang Anda kosong',
      text: 'Silakan tambahkan produk sebelum checkout.',
      confirmButtonText: 'OK'
    });
    return;
  }
  const greeting = getGreeting();
  let message = `Selamat ${greeting} Admin Bakkar,\n`;
  message += "Saya ingin memesan menu bakkar berikut:\n";

  cart.forEach((item, index) => {
    message += `${index + 1}. ${item.name} - ${item.quantity} pcs \n`;
  });

  const encodedMessage = encodeURIComponent(message);
  const whatsappUrl = `https://wa.me/6285155238654?text=${encodedMessage}`;
  window.open(whatsappUrl, "_blank");

  cart = [];
  updateCart();
  displayCart();
  updateCartCount(); // Update cart icon count
}

// Display cart and cart count when the page loads
window.onload = function() {
  displayCart();
  updateCartCount();
};
