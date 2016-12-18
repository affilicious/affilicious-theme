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
            $('#footer-copyright').html(text);
        });
    });
})(jQuery);
