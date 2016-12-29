(function(){
    jQuery('.slick-gallery').slick({
        asNavFor: '.slick-nav',
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: false,
        mobileFirst: true,
        pauseOnHover: true,
        swipe: true,
        lazyload: 'ondemand'
    });
    jQuery('.slick-nav').slick({
        asNavFor: '.slick-gallery',
        infinite: true,
        mobileFirst: true,
        slidesToScroll: 1,
        focusOnSelect: true
    });
})(jQuery);