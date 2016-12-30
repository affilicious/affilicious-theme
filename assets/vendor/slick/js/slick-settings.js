// Relations Image Gallery Settings

(function(){
    jQuery('.slick-relations-gallery').slick({
        asNavFor: '.slick-relations-nav',
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        autoplay: false,
        mobileFirst: true,
        pauseOnHover: true,
        swipe: true,
        lazyload: 'ondemand',
        responsive: [
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]

    });
    jQuery('.slick-relations-nav').slick({
        asNavFor: '.slick-relations-gallery',
        infinite: true,
        mobileFirst: true,
        slidesToScroll: 1,
        focusOnSelect: true
    });
})(jQuery);

// Product Image Gallery Settings

(function(){
    jQuery('.slick-product-gallery').slick({
        asNavFor: '.slick-product-nav',
        arrows: false,
        dots: false,
        adaptiveHeight: true,
        slidesToShow: 1,
        autoplay: false,
        infinite: false,
        mobileFirst: true,
        pauseOnHover: true,
        swipe: true,
        lazyload: 'ondemand'

    });
    jQuery('.slick-product-nav').slick({
        asNavFor: '.slick-product-gallery',
        infinite: false,
        
    });
})(jQuery);