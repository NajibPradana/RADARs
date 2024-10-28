function confirmDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        document.getElementById('arsip-form').action = "{{ route('arsip.destroy', $arsip->arsip_id) }}";
        document.getElementById('arsip-form').method = 'POST';
        document.getElementById('arsip-form').appendChild(createInput('_method', 'DELETE'));
        document.getElementById('arsip-form').submit();
    }
}

function createInput(name, value) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = value;
    return input;
}