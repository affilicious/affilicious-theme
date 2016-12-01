(function ($) {
    wp.customize('afft-content-product-current-price-color', function (value) {
        value.bind(function (color) {
            var price = $('.current-price, .price');
            price.css('color', color);
        });
    });

    wp.customize('afft-content-product-old-price-color', function (value) {
        value.bind(function (color) {
            var price = $('.old-price');
            price.css('color', color);
        });
    });

    wp.customize('afft-content-product-star-rating-color', function (value) {
        value.bind(function (color) {
            var starRating = $('.product-review-rating');
            starRating.css('color', color);
        });
    });

    wp.customize('afft-content-product-details-background-color-odd', function (value) {
        value.bind(function (color) {
            var details = $('.product-details.table > tbody > tr:nth-child(odd)');
            details.css('background-color', color);
        });
    });

    wp.customize('afft-content-product-details-background-color-even', function (value) {
        value.bind(function (color) {
            var details = $('.product-details.table > tbody > tr:nth-child(even)');
            details.css('background-color', color);
        });
    });

    wp.customize('afft-content-product-details-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.product-details.table > tbody > tr > td');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-product-attributes-choice-background-color', function (value) {
        value.bind(function (color) {
            var border = $('li.aff-product-attributes-choice:not(.selected)');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-product-attributes-choice-background-color-hover', function (value) {
        value.bind(function (color) {
            $('li.aff-product-attributes-choice:not(.selected)').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-attributes-choice-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-product-attributes-choice-background-color-selected', function (value) {
        value.bind(function (color) {
            var border = $('li.aff-product-attributes-choice.selected');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-product-attributes-choice-border-color', function (value) {
        value.bind(function (color) {
            var border = $('li.aff-product-attributes-choice:not(.selected)');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-product-attributes-choice-border-color-hover', function (value) {
        value.bind(function (color) {
            $('li.aff-product-attributes-choice:not(.selected)').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-attributes-choice-border-color').get();
                $(this).css('border-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-product-attributes-choice-border-color-selected', function (value) {
        value.bind(function (color) {
            var border = $('li.aff-product-attributes-choice.selected');
            border.css('border-color', color);
        });
    });
})(jQuery);
(function ($) {
    wp.customize('afft-footer-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-general-background-color-bottom').get();

            var footer = $('#footer');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-general-background-color-top').get();

            var footer = $('#footer');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
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
            breadcrumbs.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            breadcrumbs.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            breadcrumbs.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            breadcrumbs.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            breadcrumbs.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-breadcrumbs-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-breadcrumbs-background-color-top').get();

            var breadcrumbs = $('#footer .footer-breadcrumbs');
            breadcrumbs.css('background-color', bottom);
            breadcrumbs.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            breadcrumbs.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            breadcrumbs.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            breadcrumbs.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
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
            $('#footer .footer-breadcrumbs a').hover(function (e) {
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
            $('#footer .footer-nav .nav-item a').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-bottom-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });
})(jQuery);
(function ($) {
    wp.customize('afft-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-general-background-color-bottom').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-general-background-color-top').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            body.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-general-background-image', function (value) {
        value.bind(function (image) {
            var body = $('body');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-general-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('body');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-general-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('body');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-general-background-size', function (value) {
        value.bind(function (size) {
            var body = $('body');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-general-background-width').get();
                var height = wp.customize.instance('afft-general-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-general-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-general-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-general-background-height').get();

                var body = $('body');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-general-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-general-background-size').get();

            if (size === 'custom') {
                var width = wp.customize.instance('afft-general-background-width').get();

                var body = $('body');
                body.css('background-size', width + ' ' + height);
            }
        });
    });
})(jQuery);
(function ($) {
    wp.customize('afft-header-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-general-background-color-bottom').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-general-background-color-top').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-general-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#header');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-header-general-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#header');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-header-general-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#header');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-header-general-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#header');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-header-general-background-width').get();
                var height = wp.customize.instance('afft-header-general-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-header-general-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-header-general-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-header-general-background-height').get();

                var body = $('#header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-header-general-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-header-general-background-size').get();

            if (size === '#header') {
                var width = wp.customize.instance('afft-header-general-background-width').get();

                var body = $('header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-header-banner-title-color', function (value) {
        value.bind(function (color) {
            $('#title').css('color', color);
        });
    });

    wp.customize('afft-header-banner-title-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if (color !== '#600099') {
                $('#title').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#title').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-banner-tagline-color', function (value) {
        value.bind(function (color) {
            $('#tagline').css('color', color);
        });
    });

    wp.customize('afft-header-banner-tagline-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if (color !== '#600099') {
                $('#tagline').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#tagline').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-main-menu-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-main-menu-background-color-bottom').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-background-color-top').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu').css('border-color', color);
        });
    });

    wp.customize('afft-header-main-menu-item-background-color-hover-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-main-menu-item-background-color-hover-bottom').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function (e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? 'linear-gradient(' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-item-background-color-hover-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-item-background-color-hover-top').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function (e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? 'linear-gradient(' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item:not(.active) a, #main-menu .navbar-brand').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item a, #main-menu .navbar-brand').hover(function (e) {
                var standart = wp.customize.instance('afft-header-main-menu-link-color').get();
                var menuItem = $(this);

                if (!menuItem.parent().hasClass('active')) {
                    menuItem.css('color', e.type === "mouseenter" ? color : standart);
                }
            });

            $('#main-menu .navbar-nav > .menu-item.active a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-item-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu > .menu-item > a').hover(function (e) {
                var item = $(this);

                if (!item.parent().hasClass('active')) {
                    item.css('background-color', e.type === "mouseenter" ? color : 'transparent');
                }
            });

            $('#main-menu .dropdown-menu .menu-item.active > a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').hover(function (e) {
                var standart = wp.customize.instance('afft-header-main-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-header-main-menu-toggle-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-toggle-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function (e) {
                var fallback = wp.customize.instance('afft-header-main-menu-toggle-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-header-main-menu-toggle-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('border-color', color);
            $('#main-menu .navbar-toggle .icon-bar').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-toggle-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function (e) {
                var fallback = wp.customize.instance('afft-header-main-menu-toggle-border-color').get();
                $('#main-menu .navbar-toggle').css('border-color', e.type === "mouseenter" ? color : fallback);
                $('#main-menu .navbar-toggle .icon-bar').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });
})(jQuery);
(function ($) {
    wp.customize('blogname', function (value) {
        value.bind(function (text) {
            $('#title').html(text);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (text) {
            $('#tagline').html(text);
        });
    });

    wp.customize('afft-information-copyright-text', function (value) {
        value.bind(function (text) {
            $('#footer .footer-copyright').html(text);
        });
    });
})(jQuery);
(function ($) {
    wp.customize('afft-header-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-general-background-color-bottom').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-general-background-color-top').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-general-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#header');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-header-general-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#header');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-header-general-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#header');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-header-general-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#header');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-header-general-background-width').get();
                var height = wp.customize.instance('afft-header-general-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-header-general-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-header-general-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-header-general-background-height').get();

                var body = $('#header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-header-general-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-header-general-background-size').get();

            if (size === '#header') {
                var width = wp.customize.instance('afft-header-general-background-width').get();

                var body = $('header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-header-banner-title-color', function (value) {
        value.bind(function (color) {
            $('#title').css('color', color);
        });
    });

    wp.customize('afft-header-banner-title-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if (color !== '#600099') {
                $('#title').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#title').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-banner-tagline-color', function (value) {
        value.bind(function (color) {
            $('#tagline').css('color', color);
        });
    });

    wp.customize('afft-header-banner-tagline-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if (color !== '#600099') {
                $('#tagline').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#tagline').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-main-menu-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-main-menu-background-color-bottom').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-background-color-top').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu').css('border-color', color);
        });
    });

    wp.customize('afft-header-main-menu-item-background-color-hover-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-main-menu-item-background-color-hover-bottom').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function (e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? 'linear-gradient(' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-item-background-color-hover-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-item-background-color-hover-top').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function (e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? 'linear-gradient(' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item:not(.active) a, #main-menu .navbar-brand').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item a, #main-menu .navbar-brand').hover(function (e) {
                var standart = wp.customize.instance('afft-header-main-menu-link-color').get();
                var menuItem = $(this);

                if (!menuItem.parent().hasClass('active')) {
                    menuItem.css('color', e.type === "mouseenter" ? color : standart);
                }
            });

            $('#main-menu .navbar-nav > .menu-item.active a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-item-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu > .menu-item > a').hover(function (e) {
                var item = $(this);

                if (!item.parent().hasClass('active')) {
                    item.css('background-color', e.type === "mouseenter" ? color : 'transparent');
                }
            });

            $('#main-menu .dropdown-menu .menu-item.active > a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-dropdown-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').hover(function (e) {
                var standart = wp.customize.instance('afft-header-main-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-header-main-menu-toggle-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-toggle-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function (e) {
                var fallback = wp.customize.instance('afft-header-main-menu-toggle-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-header-main-menu-toggle-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('border-color', color);
            $('#main-menu .navbar-toggle .icon-bar').css('background-color', color);
        });
    });

    wp.customize('afft-header-main-menu-toggle-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function (e) {
                var fallback = wp.customize.instance('afft-header-main-menu-toggle-border-color').get();
                $('#main-menu .navbar-toggle').css('border-color', e.type === "mouseenter" ? color : fallback);
                $('#main-menu .navbar-toggle .icon-bar').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });
})(jQuery);