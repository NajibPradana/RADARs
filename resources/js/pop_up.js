document.addEventListener("DOMContentLoaded", function() {
    const previewPopup = document.getElementById("previewPopup");
    const closePopup = document.getElementById("closePopup");
    const exportBtn = document.getElementById("exportBtn");

    // Fungsi untuk menampilkan pop-up preview
    function showPreview() {
        previewPopup.classList.remove("hidden");
    }

    // Tutup pop-up saat tombol "Tutup" diklik
    closePopup.addEventListener("click", function() {
        previewPopup.classList.add("hidden");
    });

    // Tambahkan event listener ke tombol Export
    exportBtn.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah aksi default jika ada
        showPreview();
    });
});
