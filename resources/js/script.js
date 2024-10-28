const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');

hamburger.addEventListener('click' , function() {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
})

window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.scrollY > fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};



function confirmDelete() {
    if (confirm("Are you sure you want to delete this item?")) {
        // Jika pengguna mengonfirmasi, lanjutkan dengan penghapusan
        // Misalnya, Anda bisa mengirimkan form atau melakukan tindakan penghapusan lainnya
        document.getElementById(formId).submit();
    } else {
        // Jika pengguna membatalkan, tidak melakukan apa-apa
    }
}


