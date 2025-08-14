$(".hamburger-menu").click(function () {
  $(this).toggleClass("active");
  $(".mobile-menu").toggleClass("active");
});
window.addEventListener("scroll", function () {
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
});
