document.addEventListener("DOMContentLoaded", function() {
  const swiper = new Swiper(".custom-slider", {
    slidesPerView: 3,
    centeredSlides: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".pagination-wrapper .swiper-pagination",
      clickable: true,
    },
  });
});