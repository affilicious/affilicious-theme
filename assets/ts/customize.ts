declare var jQuery:any;
declare var wp:any;

(function ($) {

    // Information
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

    wp.customize('general-copyright-text', function (value) {
        value.bind(function (text) {
            $('#footer .footer-copyright').html(text);
        });
    });

    // General
    wp.customize('general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('general-background-color-bottom').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('general-background-color-bottom').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('general-background-image', function (value) {
        value.bind(function (image) {
            var body = $('body');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('general-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('body');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('general-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('body');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('general-background-size', function (value) {
        value.bind(function (size) {
            var body = $('body');

            if (size === 'custom') {
                var width = wp.customize.instance('general-background-width').get();
                var height = wp.customize.instance('general-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('general-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('general-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('general-background-height').get();

                var body = $('body');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('general-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('general-background-size').get();

            if (size === 'custom') {
                var width = wp.customize.instance('general-background-width').get();

                var body = $('body');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    // Typography
    wp.customize('typography-headline-font-family', function (value) {
        value.bind(function (font) {
            var headlines = $('h1, h2, h3, h4, h5, h6');
            headlines.css('font-family', font);
        });
    });

    wp.customize('typography-headline-color', function (value) {
        value.bind(function (color) {
            var headlines = $('content h1, main h2, main h3, main h4, main h5, main h6');
            headlines.css('color', color);
        });
    });

    wp.customize('typography-text-font-family', function (value) {
        value.bind(function (font) {
            var text = $('content, main p, main span, main li, main time');
            text.css('font-family', font);
        });
    });

    wp.customize('typography-text-color', function (value) {
        value.bind(function (color) {
            var text = $('content, main p, main span, main li, main time');
            text.css('color', color);
        });
    });

    wp.customize('typography-text-link-color', function (value) {
        value.bind(function (color) {
            var link = $('content a:not(.price, .btn)');
            link.css('color', color);
        });
    });

    wp.customize('typography-text-link-color-hover', function (value) {
        value.bind(function (color) {
            $('content a:not(.price, .btn)').on('hover click focus', function(e) {
                var standart = wp.customize.instance('typography-text-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('content-alert-success-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('background-color', color);
        });
    });

    wp.customize('content-alert-success-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('color', color);
        });
    });

    wp.customize('content-alert-success-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success .alert-link').css('color', color);
        });
    });

    wp.customize('content-alert-success-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('content-alert-success-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('content-alert-success-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('border-color', color);
        });
    });

    wp.customize('content-alert-info-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('background-color', color);
        });
    });

    wp.customize('content-alert-info-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('color', color);
        });
    });

    wp.customize('content-alert-info-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info .alert-link').css('color', color);
        });
    });

    wp.customize('content-alert-info-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('content-alert-info-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('content-alert-info-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('border-color', color);
        });
    });

    wp.customize('content-alert-warning-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('background-color', color);
        });
    });

    wp.customize('content-alert-warning-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('color', color);
        });
    });

    wp.customize('content-alert-warning-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning .alert-link').css('color', color);
        });
    });

    wp.customize('content-alert-warning-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('content-alert-warning-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('content-alert-warning-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('border-color', color);
        });
    });

    wp.customize('content-alert-danger-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('background-color', color);
        });
    });

    wp.customize('content-alert-danger-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('color', color);
        });
    });

    wp.customize('content-alert-danger-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger .alert-link').css('color', color);
        });
    });

    wp.customize('content-alert-danger-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('content-alert-danger-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('content-alert-danger-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('border-color', color);
        });
    });

    wp.customize('content-panel-default-heading-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('content-panel-default-heading-background-color-bottom').get();

            var panel = $('.panel.panel-default .panel-heading');
            panel.css('background-color', bottom);
            panel.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            panel.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('content-panel-default-heading-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('content-panel-default-heading-background-color-top').get();

            var panel = $('.panel.panel-default .panel-heading');
            panel.css('background-color', bottom);
            panel.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            panel.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('content-panel-default-heading-border-color', function (value) {
        value.bind(function (color) {
            $('.panel.panel-default .panel-heading').css('border-color', color);
        });
    });

    wp.customize('content-panel-default-title-color', function (value) {
        value.bind(function (color) {
            $('.panel.panel-default .panel-heading h1,' +
              '.panel.panel-default .panel-heading h2,' +
              '.panel.panel-default .panel-heading h3,' +
              '.panel.panel-default .panel-heading h4,' +
              '.panel.panel-default .panel-heading h5,' +
              '.panel.panel-default .panel-heading h6').css('color', color);
        });
    });

    wp.customize('content-button-buy-background-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('background-color', color);
        });
    });

    wp.customize('content-button-buy-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-buy').on('hover focus', function(e) {
                var fallback = wp.customize.instance('content-button-buy-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('content-button-buy-border-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('border-color', color);
        });
    });

    wp.customize('content-button-buy-text-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('color', color);
        });
    });

    wp.customize('content-button-review-background-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('background-color', color);
        });
    });

    wp.customize('content-button-review-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-review').on('hover focus', function(e) {
                var fallback = wp.customize.instance('content-button-review-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('content-button-review-border-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('border-color', color);
        });
    });

    wp.customize('content-button-review-text-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('color', color);
        });
    });

    // Header
    wp.customize('header-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('header-general-background-color-bottom').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('header-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('header-general-background-color-top').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('header-general-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#header');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('header-general-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#header');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('header-general-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#header');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('header-general-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#header');

            if (size === 'custom') {
                var width = wp.customize.instance('header-general-background-width').get();
                var height = wp.customize.instance('header-general-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('header-general-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('header-general-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('header-general-background-height').get();

                var body = $('#header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('header-general-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('header-general-background-size').get();

            if (size === '#header') {
                var width = wp.customize.instance('header-general-background-width').get();

                var body = $('header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('header-banner-title-color', function (value) {
        value.bind(function (color) {
            $('#title').css('color', color);
        });
    });

    wp.customize('header-banner-title-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if(color !== '#600099') {
                $('#title').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#title').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('header-banner-tagline-color', function (value) {
        value.bind(function (color) {
            $('#tagline').css('color', color);
        });
    });

    wp.customize('header-banner-tagline-shadow-color', function (value) {
        value.bind(function (color) {

            // There is no transparent color picker. The color #600099 stands for transparency
            if(color !== '#600099') {
                $('#tagline').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#tagline').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('header-main-menu-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('header-main-menu-background-color-bottom').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('header-main-menu-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('header-main-menu-background-color-top').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('header-main-menu-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu').css('border-color', color);
        });
    });

    wp.customize('header-main-menu-item-background-color-hover-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('header-main-menu-item-background-color-hover-bottom').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function(e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('header-main-menu-item-background-color-hover-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('header-main-menu-item-background-color-hover-top').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function(e) {
                var menu = $(this);

                if (!menu.parent().hasClass('active')) {
                    menu.css('background-color', bottom);
                    menu.css('background', e.type === "mouseenter" ? 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                    menu.css('background', e.type === "mouseenter" ? '-o-linear-gradient(top, ' + top + ', ' + bottom + ')' : 'transparent');
                }
            });

            var menu = $('#main-menu .navbar-nav > .menu-item.active > a, #main-menu .navbar-nav > .menu-item.open > a');
            menu.css('background-color', bottom);
            menu.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        })
    });

    wp.customize('header-main-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item:not(.active) a, #main-menu .navbar-brand').css('color', color);
        });
    });

    wp.customize('header-main-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item a, #main-menu .navbar-brand').hover(function(e) {
                var standart = wp.customize.instance('header-main-menu-link-color').get();
                var menuItem = $(this);

                if(!menuItem.parent().hasClass('active')) {
                    menuItem.css('color', e.type === "mouseenter" ? color : standart);
                }
            });

            $('#main-menu .navbar-nav > .menu-item.active a').css('color', color);
        });
    });

    wp.customize('header-main-menu-dropdown-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu').css('background-color', color);
        });
    });

    wp.customize('header-main-menu-dropdown-item-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu > .menu-item > a').hover(function(e) {
                var item = $(this);

                if(!item.parent().hasClass('active')) {
                    item.css('background-color', e.type === "mouseenter" ? color : 'transparent');
                }
            });

            $('#main-menu .dropdown-menu .menu-item.active > a').css('color', color);
        });
    });

    wp.customize('header-main-menu-dropdown-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').css('color', color);
        });
    });

    wp.customize('header-main-menu-dropdown-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .dropdown-menu .menu-item > a').hover(function(e) {
                var standart = wp.customize.instance('header-main-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('header-main-menu-toggle-background-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('background-color', color);
        });
    });

    wp.customize('header-main-menu-toggle-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function(e) {
                var fallback = wp.customize.instance('header-main-menu-toggle-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('header-main-menu-toggle-border-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').css('border-color', color);
            $('#main-menu .navbar-toggle .icon-bar').css('background-color', color);
        });
    });

    wp.customize('header-main-menu-toggle-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-toggle').hover(function(e) {
                var fallback = wp.customize.instance('header-main-menu-toggle-border-color').get();
                $('#main-menu .navbar-toggle').css('border-color', e.type === "mouseenter" ? color : fallback);
                $('#main-menu .navbar-toggle .icon-bar').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    // Main
    wp.customize('content-product-current-price-color', function (value) {
        value.bind(function (color) {
            var price = $('.current-price, .price');
            price.css('color', color);
        });
    });

    wp.customize('content-product-old-price-color', function (value) {
        value.bind(function (color) {
            var price = $('.old-price');
            price.css('color', color);
        });
    });

    wp.customize('content-product-star-rating-color', function (value) {
        value.bind(function (color) {
            var starRating = $('.product-review-rating');
            starRating.css('color', color);
        });
    });

    wp.customize('content-product-details-background-color-odd', function (value) {
        value.bind(function (color) {
            var details = $('.product-details.table > tbody > tr:nth-child(odd)');
            details.css('background-color', color);
        });
    });

    wp.customize('content-product-details-background-color-even', function (value) {
        value.bind(function (color) {
            var details = $('.product-details.table > tbody > tr:nth-child(even)');
            details.css('background-color', color);
        });
    });

    wp.customize('content-product-details-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.product-details.table > tbody > tr > td');
            border.css('border-color', color);
        });
    });

    // Footer
    wp.customize('footer-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('footer-general-background-color-bottom').get();

            var header = $('#footer');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('footer-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('footer-general-background-color-top').get();

            var header = $('#footer');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('footer-general-logo-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-logo a').css('color', color);
        });
    });

    wp.customize('footer-general-copyright-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-copyright').css('color', color);
        });
    });

    wp.customize('footer-breadcrumbs-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('footer-breadcrumbs-background-color-bottom').get();

            var header = $('#footer .footer-breadcrumbs');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('footer-breadcrumbs-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('footer-breadcrumbs-background-color-top').get();

            var header = $('#footer .footer-breadcrumbs');
            header.css('background-color', bottom);
            header.css('background', 'webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
        });
    });

    wp.customize('footer-breadcrumbs-text-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs').css('color', color);
        });
    });

    wp.customize('footer-breadcrumbs-border-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs').css('border-color', color);
        });
    });

    wp.customize('footer-breadcrumbs-link-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs a').css('color', color);
        });
    });

    wp.customize('footer-breadcrumbs-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer .footer-breadcrumbs a').hover(function(e) {
                var standart = wp.customize.instance('footer-breadcrumbs-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('footer-bottom-menu-title-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-title').css('color', color);
        });
    });

    wp.customize('footer-bottom-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').css('color', color);
        });
    });

    wp.customize('footer-bottom-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').hover(function(e) {
                var standart = wp.customize.instance('footer-bottom-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

})(jQuery);
