(function ($) {
    wp.customize('afft-content-product-current-price-color', function (value) {
        value.bind(function (color) {
            $('.current-price').css('color', color);
        });
    });

    wp.customize('afft-content-product-old-price-color', function (value) {
        value.bind(function (color) {
            $('.old-price').css('color', color);
        });
    });

    wp.customize('afft-content-product-star-rating-color', function (value) {
        value.bind(function (color) {
            var starRating = $('.product-review-rating');
            starRating.css('color', color);
        });
    });

    wp.customize('afft-content-product-custom-tag-text-color', function (value) {
        value.bind(function (color) {
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').css('color', color);
        });
    });

    wp.customize('afft-content-product-custom-tag-text-color-hover', function (value) {
        value.bind(function (color) {
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-custom-tag-text-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-product-custom-tag-background-color', function (value) {
        value.bind(function (color) {
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').css('background-color', color);
        });
    });

    wp.customize('afft-content-product-custom-tag-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-custom-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-product-price-tag-text-color', function (value) {
        value.bind(function (color) {
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').css('color', color);
        });
    });

    wp.customize('afft-content-product-price-tag-text-color-hover', function (value) {
        value.bind(function (color) {
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-price-tag-text-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-product-price-tag-background-color', function (value) {
        value.bind(function (color) {
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').css('background-color', color);
        });
    });

    wp.customize('afft-content-product-price-tag-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-product-price-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
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

    wp.customize('afft-content-post-date-day-color', function (value) {
        value.bind(function (color) {
            $('.entry-date .day, .entry-preview-date .day').css('color', color);
        });
    });

    wp.customize('afft-content-post-date-month-color', function (value) {
        value.bind(function (color) {
            $('.entry-date .month, .entry-preview-date .month').css('color', color);
        });
    });

    wp.customize('afft-content-post-date-year-color', function (value) {
        value.bind(function (color) {
            $('.entry-date .year, .entry-preview-date .year').css('color', color);
        });
    });

    wp.customize('afft-content-post-category-color', function (value) {
        value.bind(function (color) {
            $('.entry-categories a, .entry-preview-categories a').css('color', color);
        });
    });

    wp.customize('afft-content-post-category-color-hover', function (value) {
        value.bind(function (color) {
            $('.entry-categories a, .entry-preview-categories a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-post-category-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-post-tag-link-color', function (value) {
        value.bind(function (color) {
            $('.entry-tags .label a, .entry-preview-tags .label a').css('color', color);
        });
    });

    wp.customize('afft-content-post-tag-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.entry-tags .label a, .entry-preview-tags .label a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-post-tag-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-post-tag-background-color', function (value) {
        value.bind(function (color) {
            $('.entry-tags .label, .entry-preview-tags .label').css('background-color', color);
        });
    });

    wp.customize('afft-content-post-tag-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.entry-tags .label, .entry-preview-tags .label').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-post-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-main-sidebar-position', function (value) {
        value.bind(function (position) {
            var sidebar = $('body.page-template-default').find('#content').children('.container').children('.row').children('div:last-child');

            if (position == 'left') {
                sidebar.addClass('flex-xl-first').addClass(' flex-lg-first');
            } else {
                sidebar.removeClass('flex-xl-first').removeClass('flex-lg-first');
            }
        });
    });

    wp.customize('afft-content-main-sidebar-tag-link-color', function (value) {
        value.bind(function (color) {
            $('#main-sidebar .tagcloud a').css('color', color);
        });
    });

    wp.customize('afft-content-main-sidebar-tag-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-sidebar .tagcloud a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-main-sidebar-tag-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-main-sidebar-tag-background-color', function (value) {
        value.bind(function (color) {
            $('#main-sidebar .tagcloud a').css('background-color', color);
        });
    });

    wp.customize('afft-content-main-sidebar-tag-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#main-sidebar .tagcloud a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-main-sidebar-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-main-sidebar-heading-background-color-top', function (value) {
        value.bind(function (top) {
            if (top == '') {
                top = 'transparent';
            }

            var bottom = wp.customize.instance('afft-content-main-sidebar-heading-background-color-bottom').get();
            if (bottom == '') {
                bottom = 'transparent';
            }

            var header = $('#main-sidebar .widget-heading');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-main-sidebar-heading-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            if (bottom == '') {
                bottom = 'transparent';
            }

            var top = wp.customize.instance('afft-content-main-sidebar-heading-background-color-top').get();
            if (top == '') {
                top = 'transparent';
            }

            var header = $('#main-sidebar .widget-heading');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-main-sidebar-headline-color', function (value) {
        value.bind(function (color) {
            var border = $('#main-sidebar .widget-headline');
            border.css('color', color);
        });
    });

    wp.customize('afft-content-button-search-background-color', function (value) {
        value.bind(function (color) {
            var border = $('.searchform button.btn');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-button-search-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.searchform button.btn').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-search-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-search-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.searchform button.btn');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-button-search-border-color-hover', function (value) {
        value.bind(function (color) {
            $('.searchform button.btn').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-search-border-color').get();
                $(this).children('i').css('border-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-search-icon-color', function (value) {
        value.bind(function (color) {
            var border = $('.searchform button.btn i');
            border.css('color', color);
        });
    });

    wp.customize('afft-content-button-search-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('.searchform button.btn').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-search-icon-color').get();
                $(this).children('i').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-buy-background-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-buy');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-button-buy-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-buy').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-buy-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-buy-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-buy');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-button-buy-border-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-buy').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-buy-border-color').get();
                $(this).children('i').css('border-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-buy-text-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-buy');
            border.css('color', color);
        });
    });

    wp.customize('afft-content-button-buy-text-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-buy').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-buy-text-color').get();
                $(this).children('i').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-not-available-background-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-not-available');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-button-not-available-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-not-available').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-not-available-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-not-available-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-not-available');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-button-not-available-border-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-not-available').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-not-available-border-color').get();
                $(this).css('border-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-not-available-text-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-not-available');
            border.css('color', color);
        });
    });

    wp.customize('afft-content-button-not-available-text-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-not-available').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-not-available-text-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-review-background-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-review');
            border.css('background-color', color);
        });
    });

    wp.customize('afft-content-button-review-background-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-review').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-review-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-review-border-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-review');
            border.css('border-color', color);
        });
    });

    wp.customize('afft-content-button-review-border-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-review').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-review-border-color').get();
                $(this).children('i').css('border-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-button-review-text-color', function (value) {
        value.bind(function (color) {
            var border = $('.btn-review');
            border.css('color', color);
        });
    });

    wp.customize('afft-content-button-review-text-color-hover', function (value) {
        value.bind(function (color) {
            $('.btn-review').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-button-review-text-color').get();
                $(this).children('i').css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-empty-search-icon-color', function (value) {
        value.bind(function (color) {
            $('#empty-search-icon').css('color', color);
        });
    });

    wp.customize('afft-content-empty-search-headline-color', function (value) {
        value.bind(function (color) {
            $('#empty-search-headline').css('color', color);
        });
    });

    wp.customize('afft-content-empty-search-text-color', function (value) {
        value.bind(function (color) {
            $('#empty-search-text').css('color', color);
        });
    });

    wp.customize('afft-content-empty-search-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-content-empty-search-background-color-bottom').get();

            var footer = $('#empty-search');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-empty-search-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-content-empty-search-background-color-top').get();

            var footer = $('#empty-search');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-empty-search-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#empty-search');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-content-empty-search-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#empty-search');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-content-empty-search-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#empty-search');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-content-empty-search-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#empty-search');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-content-empty-search-background-width').get();
                var height = wp.customize.instance('afft-content-empty-search-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-content-empty-search-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-content-empty-search-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-content-empty-search-background-height').get();

                var body = $('#empty-search');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-content-empty-search-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-content-empty-search-background-size').get();

            if (size === 'custom') {
                var width = wp.customize.instance('afft-content-empty-search-background-width').get();

                var body = $('#empty-search');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-content-not-found-error-code-color', function (value) {
        value.bind(function (color) {
            $('#not-found-error-code').css('color', color);
        });
    });

    wp.customize('afft-content-not-found-headline-color', function (value) {
        value.bind(function (color) {
            $('#not-found-headline').css('color', color);
        });
    });

    wp.customize('afft-content-not-found-text-color', function (value) {
        value.bind(function (color) {
            $('#not-found-text').css('color', color);
        });
    });

    wp.customize('afft-content-not-found-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-content-not-found-background-color-bottom').get();

            var footer = $('#not-found');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-not-found-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-content-not-found-background-color-top').get();

            var footer = $('#not-found');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-not-found-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#not-found');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-content-not-found-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#not-found');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-content-not-found-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#not-found');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-content-not-found-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#not-found');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-content-not-found-background-width').get();
                var height = wp.customize.instance('afft-content-not-found-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-content-not-found-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-content-not-found-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-content-not-found-background-height').get();

                var body = $('#not-found');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-content-not-found-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-content-not-found-background-size').get();

            if (size === 'custom') {
                var width = wp.customize.instance('afft-content-not-found-background-width').get();

                var body = $('#not-found');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-content-alert-info-text-color', function (value) {
        value.bind(function (color) {
            $('.alert-info p').css('color', color);
        });
    });

    wp.customize('afft-content-alert-info-link-color', function (value) {
        value.bind(function (color) {
            $('.alert-info a').css('color', color);
        });
    });

    wp.customize('afft-content-alert-info-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert-info a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-alert-info-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-alert-info-background-color', function (value) {
        value.bind(function (color) {
            $('.alert-info').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-info-border-color', function (value) {
        value.bind(function (color) {
            $('.alert-info').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-success-text-color', function (value) {
        value.bind(function (color) {
            $('.alert-success p').css('color', color);
        });
    });

    wp.customize('afft-content-alert-success-link-color', function (value) {
        value.bind(function (color) {
            $('.alert-success a').css('color', color);
        });
    });

    wp.customize('afft-content-alert-success-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert-success a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-alert-success-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-alert-success-background-color', function (value) {
        value.bind(function (color) {
            $('.alert-success').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-success-border-color', function (value) {
        value.bind(function (color) {
            $('.alert-success').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-warning-text-color', function (value) {
        value.bind(function (color) {
            $('.alert-warning p').css('color', color);
        });
    });

    wp.customize('afft-content-alert-warning-link-color', function (value) {
        value.bind(function (color) {
            $('.alert-warning a').css('color', color);
        });
    });

    wp.customize('afft-content-alert-warning-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert-warning a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-alert-warning-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-alert-warning-background-color', function (value) {
        value.bind(function (color) {
            $('.alert-warning').css('background-color', color);
        });
    });

    wp.customize('afft-content-alert-warning-border-color', function (value) {
        value.bind(function (color) {
            $('.alert-warning').css('border-color', color);
        });
    });

    wp.customize('afft-content-alert-danger-text-color', function (value) {
        value.bind(function (color) {
            $('.alert-danger p').css('color', color);
        });
    });

    wp.customize('afft-content-alert-danger-link-color', function (value) {
        value.bind(function (color) {
            $('.alert-danger a').css('color', color);
        });
    });

    wp.customize('afft-content-alert-danger-link-color-hover', function (value) {
        value.bind(function (color) {
            $('.alert-danger a').hover(function (e) {
                var fallback = wp.customize.instance('afft-content-alert-danger-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-alert-danger-border-color', function (value) {
        value.bind(function (color) {
            $('.alert-danger').css('border-color', color);
        });
    });
})(jQuery);

/*
 $options['afft-content-alert-danger-text-color'] = array(
 'id'        => 'afft-content-alert-danger-text-color',
 'label'     => __('Danger Text Color', 'affilicious-theme'),
 'section'   => $section,
 'type'      => 'color',
 'default'   => '#a94442',
 'transport' => 'postMessage',
 );

 $options['afft-content-alert-danger-link-color'] = array(
 'id'        => 'afft-content-alert-danger-link-color',
 'label'     => __('Danger Link Color', 'affilicious-theme'),
 'section'   => $section,
 'type'      => 'color',
 'default'   => '#843534',
 'transport' => 'postMessage',
 );

 $options['afft-content-alert-danger-link-color-hover'] = array(
 'id'        => 'afft-content-alert-danger-link-color-hover',
 'label'     => __('Danger Link Color (Hover)', 'affilicious-theme'),
 'section'   => $section,
 'type'      => 'color',
 'default'   => '#9b3c3c',
 'transport' => 'postMessage',
 );

 $options['afft-content-alert-danger-border-color'] = array(
 'id'        => 'afft-content-alert-danger-border-color',
 'label'     => __('Danger Border Color', 'affilicious-theme'),
 'section'   => $section,
 'type'      => 'color',
 'default'   => '#ed5565',
 'transport' => 'postMessage',
 );
 */
(function ($) {
    wp.customize('afft-footer-breadcrumbs-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-breadcrumbs-background-color-bottom').get();

            var breadcrumbs = $('#footer-breadcrumbs');
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

            var breadcrumbs = $('#footer-breadcrumbs');
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
            $('#footer-breadcrumbs').css('color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-border-color', function (value) {
        value.bind(function (color) {
            $('#footer-breadcrumbs').css('border-color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-link-color', function (value) {
        value.bind(function (color) {
            $('#footer-breadcrumbs a').css('color', color);
        });
    });

    wp.customize('afft-footer-breadcrumbs-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-breadcrumbs a').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-breadcrumbs-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-content-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-content-background-color-bottom').get();

            var footer = $('#footer-content');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-content-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-content-background-color-top').get();

            var footer = $('#footer-content');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-content-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#footer-content');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-footer-content-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#footer-content');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-footer-content-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#footer-content');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-footer-content-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#footer-content');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-footer-content-background-width').get();
                var height = wp.customize.instance('afft-footer-content-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-footer-content-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-footer-content-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-footer-content-background-height').get();

                var body = $('#footer-content');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-footer-content-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-footer-content-background-size').get();

            if (size === 'custom') {
                var width = wp.customize.instance('afft-footer-content-background-width').get();

                var body = $('#footer-content');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-footer-content-menu-headline-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-title').css('color', color);
        });
    });

    wp.customize('afft-footer-content-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').css('color', color);
        });
    });

    wp.customize('afft-footer-content-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer .footer-nav .nav-item a').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-content-menu-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-footer-sidebar-headline-color', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar h1, #footer-sidebar h2, #footer-sidebar h3, #footer-sidebar h4, #footer-sidebar h5, #footer-sidebar h6').css('color', color);
        });
    });

    wp.customize('afft-footer-footer-sidebar-text-color', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar').css('color', color);
        });
    });

    wp.customize('afft-footer-footer-sidebar-link-color', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar a').css('color', color);
        });
    });

    wp.customize('afft-footer-footer-sidebar-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar a').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-footer-sidebar-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-footer-sidebar-tag-link-color', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar .tagcloud a').css('color', color);
        });
    });

    wp.customize('afft-footer-footer-sidebar-tag-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar .tagcloud a').hover(function (e) {
                var fallback = wp.customize.instance('afft-footer-footer-sidebar-tag-link-color').get();
                $(this).css('color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-footer-footer-sidebar-tag-background-color', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar .tagcloud a').css('background-color', color);
        });
    });

    wp.customize('afft-footer-footer-sidebar-tag-background-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-sidebar .tagcloud a').hover(function (e) {
                var fallback = wp.customize.instance('afft-footer-footer-sidebar-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-footer-plinth-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-plinth-background-color-bottom').get();

            var footer = $('#footer-plinth');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-plinth-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-plinth-background-color-top').get();

            var footer = $('#footer-plinth');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-plinth-copyright-color', function (value) {
        value.bind(function (color) {
            $('#footer-copyright').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-icon-color', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.facebook i').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.facebook i').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-facebook-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-facebook-background-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.facebook').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-background-color-hover', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.facebook:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-facebook-border-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.facebook').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.facebook').hover(function (e) {
                if (color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-facebook-border-color').get();
                if (standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-twitter-icon-color', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.twitter i').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-twitter-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.twitter i').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-twitter-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-twitter-background-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.twitter').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-twitter-background-color-hover', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.twitter:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-twitter-border-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.twitter').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-twitter-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.twitter').hover(function (e) {
                if (color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-twitter-border-color').get();
                if (standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-google-plus-icon-color', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.google-plus i').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-google-plus-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.google-plus i').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-google-plus-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-google-plus-background-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.google-plus').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-google-plus-background-color-hover', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.google-plus:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-google-plus-border-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.google-plus').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-google-plus-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.google-plus').hover(function (e) {
                if (color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-google-plus-border-color').get();
                if (standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-pinterest-icon-color', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.pinterest i').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-pinterest-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.pinterest i').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-pinterest-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-pinterest-background-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.pinterest').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-pinterest-background-color-hover', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.pinterest:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-pinterest-border-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.pinterest').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-pinterest-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.pinterest').hover(function (e) {
                if (color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-pinterest-border-color').get();
                if (standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-reddit-icon-color', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.reddit i').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-reddit-icon-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.reddit i').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-reddit-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-reddit-background-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.reddit').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-reddit-background-color-hover', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.reddit:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-reddit-border-color', function (value) {
        value.bind(function (color) {
            if (color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.reddit').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-reddit-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.reddit').hover(function (e) {
                if (color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-reddit-border-color').get();
                if (standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-menu-link-color', function (value) {
        value.bind(function (color) {
            $('#footer-plinth .menu-item a').css('color', color);
        });
    });

    wp.customize('afft-footer-plinth-menu-link-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-plinth .menu-item a').hover(function (e) {
                var standart = wp.customize.instance('afft-footer-plinth-reddit-icon-color').get();
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
    wp.customize('afft-header-banner-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-header-banner-background-color-bottom').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-banner-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-header-banner-background-color-top').get();

            var header = $('#header');
            header.css('background-color', bottom);
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to(' + bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', ' + bottom + ')');
            header.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-header-banner-background-image', function (value) {
        value.bind(function (image) {
            var body = $('#header');
            body.css('background-image', 'url(' + image + ')');
        });
    });

    wp.customize('afft-header-banner-background-repeat', function (value) {
        value.bind(function (repeat) {
            var body = $('#header');
            body.css('background-repeat', repeat);
        });
    });

    wp.customize('afft-header-banner-background-attachment', function (value) {
        value.bind(function (attachment) {
            var body = $('#header');
            body.css('background-attachment', attachment);
        });
    });

    wp.customize('afft-header-banner-background-size', function (value) {
        value.bind(function (size) {
            var body = $('#header');

            if (size === 'custom') {
                var width = wp.customize.instance('afft-header-banner-background-width').get();
                var height = wp.customize.instance('afft-header-banner-background-height').get();

                body.css('background-size', width + ' ' + height);
            } else {
                body.css('background-size', size);
            }
        });
    });

    wp.customize('afft-header-banner-background-width', function (value) {
        value.bind(function (width) {
            var size = wp.customize.instance('afft-header-banner-background-size').get();

            if (size === 'custom') {
                var height = wp.customize.instance('afft-header-banner-background-height').get();

                var body = $('#header');
                body.css('background-size', width + ' ' + height);
            }
        });
    });

    wp.customize('afft-header-banner-background-height', function (value) {
        value.bind(function (height) {
            var size = wp.customize.instance('afft-header-banner-background-size').get();

            if (size === '#header') {
                var width = wp.customize.instance('afft-header-banner-background-width').get();

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
            if (color !== '') {
                $('#title').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#title').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-banner-title-font-family', function (value) {
        value.bind(function (color) {
            $('#title').css('font-family', color);
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
            if (color !== '') {
                $('#tagline').css('text-shadow', '1px 1px 1px ' + color);
            } else {
                $('#tagline').css('text-shadow', '0 0 0 rgba(0, 0, 0, 0)');
            }
        });
    });

    wp.customize('afft-header-banner-tagline-font-family', function (value) {
        value.bind(function (value) {
            $('#tagline').css('font-family', value);
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
            $('#footer-copyright').html(text);
        });
    });
})(jQuery);
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
            $('main a:not(.price, .btn), main a > span.unit').hover(function (e) {
                var standart = wp.customize.instance('afft-typography-link-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });
})(jQuery);