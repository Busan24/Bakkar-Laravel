 // Mencegah klik kanan pada halaman
 document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    Swal.fire({
        icon: 'warning',
        title: 'Akses Diblokir',
        text: 'Klik kanan dinonaktifkan untuk alasan keamanan.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
});

// Mencegah penggunaan kombinasi tombol tertentu
document.addEventListener('keydown', function(e) {
    // Memblokir F12 (DevTools)
    if (e.key === 'F12') {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Akses Diblokir',
            text: 'Fitur ini dinonaktifkan untuk alasan keamanan.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    }
    
    // Memblokir Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+Shift+C, Ctrl+U, dan Ctrl+S
    if ((e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C')) || (e.ctrlKey && (e.key === 'U' || e.key === 'S'))) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Akses Diblokir',
            text: 'Fitur ini dinonaktifkan untuk alasan keamanan.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    }
});