'use strict';

// ini buat header kalau di scroll kebawah lebih dari 100 maka bakalan nambah class "active", kalau ada class "active" nanti header nya jadi punya background warna putih
const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    // kalau di scroll kebawah sebanyak 100 bakal langsung nambahin class "active"
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    // kalau nggak di scroll bakalan ngehapus class "active"
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});


// Ini buat navbar, pas lu click misalkan page About nanti warna page nya bakalan berubah menjadi warna merah
document.addEventListener("DOMContentLoaded", function() {
  var navbarLinks = document.querySelectorAll('.navbar-link');
  navbarLinks.forEach(function(navbarLink) {
    navbarLink.addEventListener('click', function(event) {
      // Code ini fungsinya buat ngehapus semua class 'active' (kalau ada)
      navbarLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      // 

      // Nambahin class 'active' ke page yang di click
      this.classList.add('active');
    });
  });
});


var loader = document.getElementById("preloader");

window.addEventListener("load", function(){
  loader.style.display = "none";
})