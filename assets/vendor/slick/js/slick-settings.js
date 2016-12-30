(function(){
    jQuery('.slick-gallery').slick({
        asNavFor: '.slick-nav',
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
    jQuery('.slick-nav').slick({
        asNavFor: '.slick-gallery',
        infinite: true,
        mobileFirst: true,
        slidesToScroll: 3,
        focusOnSelect: true
    });
})(jQuery);