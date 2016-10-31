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

    wp.customize('afft-information-copyright-text', function (value) {
        value.bind(function (text) {
            $('#footer .footer-copyright').html(text);
        });
    });

    // General
    wp.customize('afft-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-general-background-color-bottom').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-general-background-color-top').get();

            var body = $('body');
            body.css('background-color', bottom);
            body.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            body.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            body.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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

    // Typography
    wp.customize('afft-typography-headline-font-family', function (value) {
        value.bind(function (font) {
            var headlines = $('h1, h2, h3, h4, h5, h6');
            headlines.css('font-family', font);
        });
    });

    wp.customize('afft-typography-headline-color', function (value) {
        value.bind(function (color) {
            var headlines = $('main h1, main h2, main h3, main h4, main h5, main h6');
            headlines.css('color', color);
        });
    });

    wp.customize('afft-typography-text-font-family', function (value) {
        value.bind(function (font) {
            var text = $('main, main p, main span, main li, main time');
            text.css('font-family', font);
        });
    });

    wp.customize('afft-typography-text-color', function (value) {
        value.bind(function (color) {
            var text = $('main, main p, main span, main li, main time');
            text.css('color', color);
        });
    });

    wp.customize('afft-typography-text-link-color', function (value) {
        value.bind(function (color) {
            var link = $('main a:not(.price, .btn), main a > span.unit');
            link.css('color', color);
        });
    });

    wp.customize('afft-typography-text-link-color-hover', function (value) {
        value.bind(function (color) {
            $('main a:not(.price, .btn), main a > span.unit').on('hover click focus', function(e) {
                var standart = wp.customize.instance('afft-typography-text-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-content-alert-success-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-success-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('color', color);
        });
    });

    wp.customize('afft-content-alert-success-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success .alert-link').css('color', color);
        });
    });

    wp.customize('afft-content-alert-success-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('afft-content-alert-success-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-content-alert-success-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-success').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-info-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-info-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('color', color);
        });
    });

    wp.customize('afft-content-alert-info-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info .alert-link').css('color', color);
        });
    });

    wp.customize('afft-content-alert-info-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('afft-content-alert-info-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-content-alert-info-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-info').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-warning-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-warning-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('color', color);
        });
    });

    wp.customize('afft-content-alert-warning-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning .alert-link').css('color', color);
        });
    });

    wp.customize('afft-content-alert-warning-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('afft-content-alert-warning-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-content-alert-warning-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-warning').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-danger-background-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-danger-text-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('color', color);
        });
    });

    wp.customize('afft-content-alert-danger-link-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger .alert-link').css('color', color);
        });
    });

    wp.customize('afft-content-alert-danger-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger .alert-link').on('hover click focus', function(e) {
                var standart = wp.customize.instance('afft-content-alert-danger-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-content-alert-danger-border-color', function (value) {
        value.bind(function (color) {
            $('.alert.alert-danger').css('border-color', color);
        });
    });

    wp.customize('afft-content-panel-default-heading-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-content-panel-default-heading-background-color-bottom').get();

            var panel = $('.panel.panel-default .panel-heading');
            panel.css('background-color', bottom);
            panel.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            panel.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-panel-default-heading-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-content-panel-default-heading-background-color-top').get();

            var panel = $('.panel.panel-default .panel-heading');
            panel.css('background-color', bottom);
            panel.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            panel.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            panel.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-panel-default-heading-border-color', function (value) {
        value.bind(function (color) {
            $('.panel.panel-default .panel-heading').css('border-color', color);
        });
    });

    wp.customize('afft-content-panel-default-title-color', function (value) {
        value.bind(function (color) {
            $('.panel.panel-default .panel-heading h1,' +
              '.panel.panel-default .panel-heading h2,' +
              '.panel.panel-default .panel-heading h3,' +
              '.panel.panel-default .panel-heading h4,' +
              '.panel.panel-default .panel-heading h5,' +
              '.panel.panel-default .panel-heading h6').css('color', color);
        });
    });

    wp.customize('afft-content-button-buy-background-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('background-color', color);
        });
    });

    wp.customize('afft-content-button-buy-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-buy').on('hover focus', function(e) {
                var fallback = wp.customize.instance('afft-content-button-buy-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-buy-border-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('border-color', color);
        });
    });

    wp.customize('afft-content-button-buy-text-color', function (value) {
        value.bind(function (color) {
            $('.btn-buy').css('color', color);
        });
    });

    wp.customize('afft-content-button-review-background-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('background-color', color);
        });
    });

    wp.customize('afft-content-button-review-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-review').on('hover focus', function(e) {
                var fallback = wp.customize.instance('afft-content-button-review-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-review-border-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('border-color', color);
        });
    });

    wp.customize('afft-content-button-review-text-color', function (value) {
        value.bind(function (color) {
            $('.btn-review').css('color', color);
        });
    });

    // Header
    wp.customize('afft-header-general-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-general-background-color-bottom').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-general-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-general-background-color-top').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            if(color !== '#600099') {
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
            if(color !== '#600099') {
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
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-background-color-top').get();

            var menu = $('#main-menu');
            menu.css('background-color', bottom);
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function(e) {
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
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-main-menu-item-background-color-hover-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-main-menu-item-background-color-hover-top').get();

            $('#main-menu .navbar-nav > .menu-item a').on('hover click focus', function(e) {
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
            menu.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            menu.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            menu.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        })
    });

    wp.customize('afft-header-main-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item:not(.active) a, #main-menu .navbar-brand').css('color', color);
        });
    });

    wp.customize('afft-header-main-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-menu .navbar-nav > .menu-item a, #main-menu .navbar-brand').hover(function(e) {
                var standart = wp.customize.instance('afft-header-main-menu-link-color').get();
                var menuItem = $(this);

                if(!menuItem.parent().hasClass('active')) {
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
            $('#main-menu .dropdown-menu > .menu-item > a').hover(function(e) {
                var item = $(this);

                if(!item.parent().hasClass('active')) {
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
            $('#main-menu .dropdown-menu .menu-item > a').hover(function(e) {
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
            $('#main-menu .navbar-toggle').hover(function(e) {
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
            $('#main-menu .navbar-toggle').hover(function(e) {
                var fallback = wp.customize.instance('afft-header-main-menu-toggle-border-color').get();
                $('#main-menu .navbar-toggle').css('border-color', e.type === "mouseenter" ? color : fallback);
                $('#main-menu .navbar-toggle .icon-bar').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    // Main
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
            $('li.aff-product-attributes-choice:not(.selected)').hover(function(e) {
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
            $('li.aff-product-attributes-choice:not(.selected)').hover(function(e) {
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

    // Footer
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
