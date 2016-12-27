(function ($) {
    wp.customize('afft-typography-headline-font-family', function (value) {
        value.bind(function (color) {
            $('main h1, main h2, main h3, main h4, main h5, main h6').css('font-family', color);
        });
    });

    wp.customize('afft-typography-headline-color', function (value) {
        value.bind(function (color) {
            $('main h1, main h2, main h3, main h4, main h5, main h6').css('color', color);
        });
    });

    wp.customize('afft-typography-text-font-family', function (value) {
        value.bind(function (color) {
            $('main, main p, main span, main li, main time').css('font-family', color);
        });
    });

    wp.customize('afft-typography-text-color', function (value) {
        value.bind(function (color) {
            $('main, main p, main span, main li, main time').css('color', color);
        });
    });

    wp.customize('afft-typography-link-font-family', function (value) {
        value.bind(function (color) {
            $('main a:not(.price, .btn), main a > span.unit').css('font-family', color);
        });
    });

    wp.customize('afft-typography-link-color', function (value) {
        value.bind(function (color) {
            $('main a:not(.price, .btn), main a > span.unit').css('color', color);
        });
    });

    wp.customize('afft-typography-link-color-hover', function (value) {
        value.bind(function (color) {
            $('main a:not(.price, .btn), main a > span.unit').hover(function(e) {
                var standart = wp.customize.instance('afft-typography-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });
})(jQuery);
