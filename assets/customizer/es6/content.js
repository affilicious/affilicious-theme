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
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').hover(function(e) {
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
            $('.product-tags .tag, .product-preview-tag-bar .tag:not(.tag-price), .product-relations-item-tag-bar .tag:not(.tag-price)').hover(function(e) {
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
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').hover(function(e) {
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
            $('.product-preview-tag-bar .tag-price, .product-relations-item-tag-bar .tag-price').hover(function(e) {
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
            $('.entry-categories a, .entry-preview-categories a').hover(function(e) {
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
            $('.entry-tags .label a, .entry-preview-tags .label a').hover(function(e) {
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
            $('.entry-tags .label, .entry-preview-tags .label').hover(function(e) {
                var fallback = wp.customize.instance('afft-content-post-tag-background-color').get();
                $(this).css('background-color', e.type === "mouseenter" ? color : fallback);
            });
        });
    });

    wp.customize('afft-content-main-sidebar-position', function (value) {
        value.bind(function (position) {
            var sidebar = $('body.page-template-default').find('#content').children('.container').children('.row').children('div:last-child');

            if(position == 'left') {
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
            $('#main-sidebar .tagcloud a').hover(function(e) {
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
            $('#main-sidebar .tagcloud a').hover(function(e) {
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
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            header.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            header.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            header.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            $('.searchform button.btn').hover(function(e) {
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
            $('.searchform button.btn').hover(function(e) {
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
            $('.searchform button.btn').hover(function(e) {
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
            $('.btn-buy').hover(function(e) {
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
            $('.btn-buy').hover(function(e) {
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
            $('.btn-buy').hover(function(e) {
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
            $('.btn-not-available').hover(function(e) {
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
            $('.btn-not-available').hover(function(e) {
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
            $('.btn-not-available').hover(function(e) {
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
            $('.btn-review').hover(function(e) {
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
            $('.btn-review').hover(function(e) {
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
            $('.btn-review').hover(function(e) {
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
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-empty-search-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-content-empty-search-background-color-top').get();

            var footer = $('#empty-search');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-content-not-found-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-content-not-found-background-color-top').get();

            var footer = $('#not-found');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            $('.alert-info a').hover(function(e) {
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
            $('.alert-success a').hover(function(e) {
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
            $('.alert-warning a').hover(function(e) {
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
            $('.alert-danger a').hover(function(e) {
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