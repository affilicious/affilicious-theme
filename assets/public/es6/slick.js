// Product Image Gallery Settings
(function($){
    $('.slick-product-gallery').slick({
        asNavFor: '.slick-product-nav',
        arrows: false,
        dots: false,
        adaptiveHeight: true,
        slidesToShow: 1,
        autoplay: false,
        infinite: true,
        mobileFirst: true,
        pauseOnHover: true,
        swipe: true,
    });

    $('.slick-product-nav').slick({
        asNavFor: '.slick-product-gallery',
        infinite: true,
        mobileFirst: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true
    });
})(jQuery);

// Relations Image Gallery Settings
(function($){
    $('.slick-relations-gallery').slick({
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        autoplay: false,
        mobileFirst: true,
        pauseOnHover: true,
        swipe: true,
        responsive: [
            {
                breakpoint: 544,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
})(jQuery);
