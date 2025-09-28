document.addEventListener('DOMContentLoaded', function() {
  new Swiper('.custom-vertical-slider', {
      direction: 'vertical',
      slidesPerView: 1,
      loop: true,
      navigation: {
          nextEl: '.custom-down',
          prevEl: '.custom-up',
      },
  });
});
  