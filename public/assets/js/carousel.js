
  document.addEventListener('DOMContentLoaded', function () {
    const slides = document.getElementById('carouselSlides');
    const totalSlides = slides.children.length;
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    let currentIndex = 0;

    // Fungsi untuk update posisi slide
    function updateSlidePosition() {
      slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    // Klik tombol sebelumnya
    prevButton.addEventListener('click', function () {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      updateSlidePosition();
    });

    // Klik tombol berikutnya
    nextButton.addEventListener('click', function () {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateSlidePosition();
    });
  });
