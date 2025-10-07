document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.custom-slider', {
        slidesPerView: 4,
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
            425: {
                slidesPerView: 1.2
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 2
            },
            1440: {
                slidesPerView: 4
            }
        }
    });
});