const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',

    //slide per page
    slidesPerView: 3,
    //space between slide
    spaceBetween: 10,
    //auto height
    autoHeight: true,

    loop: true,

    cssMode:false,

    //center slider set
    centeredSlides:true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },

    //css class modify class
    containerModifierClass:'swiper-container-creatrix- ',

    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 4,
            spaceBetween: 20
        },
         // when window width is >= 1140px
        1140: {
            slidesPerView: 3,
            spaceBetween: 0
        }
    }
});
