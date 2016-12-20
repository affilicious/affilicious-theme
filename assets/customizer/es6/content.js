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

    wp.customize('afft-content-widget-heading-background-color-top', function (value) {
        value.bind(function (top) {
            if (top == '') {
                top = 'transparent';
            }

            var bottom = wp.customize.instance('afft-content-widget-heading-background-color-bottom').get();
            if (bottom == '') {
                bottom = 'transparent';
            }

            var header = $('.panel .panel-heading');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-widget-heading-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            if (bottom == '') {
                bottom = 'transparent';
            }

            var top = wp.customize.instance('afft-content-widget-heading-background-color-top').get();
            if (top == '') {
                top = 'transparent';
            }

            var header = $('.panel .panel-heading');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-widget-heading-title-color', function (value) {
        value.bind(function (color) {
            var border = $('.panel .panel-heading h1, .panel .panel-heading h2, .panel .panel-heading h3, .panel .panel-heading h4, .panel .panel-heading h5, .panel .panel-heading h6');
            border.css('color', color);
        });
    });
})(jQuery);
