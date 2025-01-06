// Ambil elemen input dan img
const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');

// Tambahkan event listener ketika file dipilih
fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0]; // Ambil file yang dipilih
    if (file) {
        const reader = new FileReader();

        // Ketika file selesai dibaca
        reader.onload = function (e) {
            preview.src = e.target.result; // Tampilkan foto
            preview.style.display = 'block'; // Tampilkan elemen img
        };

        // Baca file sebagai Data URL
        reader.readAsDataURL(file);
    } else {
        preview.src = ''; // Hapus preview jika tidak ada file
        preview.style.display = 'none';
    }
});