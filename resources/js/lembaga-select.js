document.addEventListener('DOMContentLoaded', function() {
    var lembagaSelect = document.getElementById('lembaga-select');
    
    lembagaSelect.addEventListener('change', function() {
        var lembagaId = lembagaSelect.value;
        var baseUrl = document.getElementById('base-url').getAttribute('data-url'); // Ambil URL dari elemen dengan ID base-url
        if (lembagaId) {
            window.location.href = `${baseUrl}?lembaga_id=${lembagaId}`;
        } else {
            window.location.href = baseUrl;
        }
    });
});
