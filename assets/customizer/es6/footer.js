(function ($) {
    wp.customize('afft-footer-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-general-background-color-bottom').get();

            var footer = $('#footer');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-general-background-color-top').get();

            var footer = $('#footer');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-general-logo-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-logo a').css('color', color);
        });
    });

    wp.customize('afft-footer-general-copyright-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-copyright').css('color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-breadcrumbs-background-color-bottom').get();

            var breadcrumbs = $('#footer .footer-breadcrumbs');
            breadcrumbs.css('background-color', bottom);
            breadcrumbs.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            breadcrumbs.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-breadcrumbs-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-breadcrumbs-background-color-top').get();

            var breadcrumbs = $('#footer .footer-breadcrumbs');
            breadcrumbs.css('background-color', bottom);
            breadcrumbs.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            breadcrumbs.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            breadcrumbs.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-breadcrumbs-text-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs').css('color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-border-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs').css('border-color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-link-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs a').css('color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs a').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-breadcrumbs-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-bottom-menu-title-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-title').css('color', color);
        });
    });

    wp.customize('afft-footer-bottom-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').css('color', color);
        });
    });

    wp.customize('afft-footer-bottom-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-bottom-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });
})(jQuery);
