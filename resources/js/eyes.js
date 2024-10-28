// eyes.js
function togglePassword() {
    var passwordField = document.getElementById('password');
    var eyeOpenIcon = document.getElementById('eye-open');
    var eyeClosedIcon = document.getElementById('eye-closed');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeOpenIcon.classList.add('hidden');  // Menyembunyikan mata terbuka
        eyeClosedIcon.classList.remove('hidden'); // Menampilkan mata tertutup
    } else {
        passwordField.type = 'password';
        eyeOpenIcon.classList.remove('hidden'); // Menampilkan mata terbuka
        eyeClosedIcon.classList.add('hidden');  // Menyembunyikan mata tertutup
    }
}
