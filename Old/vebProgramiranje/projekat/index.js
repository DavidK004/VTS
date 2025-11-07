new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    

    slidesPerView: 1,
    spaceBetween: 0,

    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
            allowTouchMove: false,
        }
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


});

new Swiper('.categories-swiper', {
    direction: 'horizontal',
    loop: true,
    
    navigation: {
        nextEl: '.categories .swiper-button-next',
        prevEl: '.categories .swiper-button-prev',
    },
    slidesPerView: 2, 
    spaceBetween: 0,
    breakpoints: {
        480: {
            slidesPerView: 3, 
            spaceBetween: 0,
        },
        640: {
            slidesPerView: 4, 
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 6, 
            spaceBetween: 0,
        },
        1024: {
            slidesPerView: 8, 
            spaceBetween: 0,
        }
    }
});