import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');

hamburger.addEventListener('click' , function() {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
})


// JavaScript untuk sticky header
window.onscroll = function() {stickyFunction()};

var header = document.querySelector("header");
var sticky = header.offsetTop;

function stickyFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
