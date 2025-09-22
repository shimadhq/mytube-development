document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.custom-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.custom-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.custom-next',
            prevEl: '.custom-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1
            },
            1024: {
                slidesPerView: 2
            },
            1440: {
                slidesPerView: 3
            }
        }
    });
});