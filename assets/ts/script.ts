declare var jQuery: any;
declare var wp: any;
declare var ResponsiveBootstrapToolkit: any;

(function($, viewport){
    $(function () {
        $("[rel='tooltip']").tooltip();
    });

    $('.thumb-slider .slick-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        focusOnSelect: true,
        adaptiveHeight: true,
        asNavFor: '.portfolio-slider .slick-slider'
    });

    $('.portfolio-slider .slick-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.thumb-slider .slick-slider',
    });

    var container = $('.portfolio-slider');
    var content = $('.portfolio-slider .slick-list');
    var containerHeight = container.height();
    var contentHeight = content.height();

    console.log(containerHeight);
    console.log(contentHeight);

    if (containerHeight > contentHeight) {
        content.css('margin-top', (containerHeight - contentHeight) / 2);
    }
})(jQuery, ResponsiveBootstrapToolkit);
