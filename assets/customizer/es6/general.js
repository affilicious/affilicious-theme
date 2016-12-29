(function ($) {
    wp.customize('afft-general-sidebar-position', function (value) {
        value.bind(function (position) {
            var sidebar = $('#content').children('.container').children('.row').children('div:last-child');

            if(position == 'left') {
                sidebar.addClass('flex-xl-first').addClass(' flex-lg-first');
            } else {
                sidebar.removeClass('flex-xl-first').removeClass('flex-lg-first');
            }
        });
    });

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
})(jQuery);
