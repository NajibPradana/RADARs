document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk tombol "Masukan"
    document.getElementById('btn-masukan').addEventListener('click', function() {
        var lembagaId = document.getElementById('lembaga-select').value;
        if (lembagaId) {
            var inputUrl = this.getAttribute('data-input-url');
            window.location.href = inputUrl + '/' + lembagaId;
        }
    });

    // Event listener untuk tombol "Lihat"
    document.getElementById('btn-lihat').addEventListener('click', function() {
        var lembagaId = document.getElementById('lembaga-select').value;
        if (lembagaId) {
            var viewUrl = this.getAttribute('data-view-url');
            window.location.href = viewUrl + '?lembaga_id=' + lembagaId;
        }
    });

    // Event listener untuk dropdown "Lembaga" untuk pilihan "Tambah Lembaga"
    document.getElementById('lembaga-select').addEventListener('change', function () {
        if (this.value === 'tambah_lembaga') { // Pastikan nilai ini sesuai dengan option value pada dropdown
            window.location.href = '{{ route("input_lembaga") }}'; // Menggunakan route helper
        }
    });
});
