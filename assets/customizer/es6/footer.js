(function ($) {
    wp.customize('afft-footer-breadcrumbs-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-breadcrumbs-background-color-bottom').get();

            var breadcrumbs = $('#footer-breadcrumbs');
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

            var breadcrumbs = $('#footer-breadcrumbs');
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
            $('#footer-breadcrumbs a').hover(function(e) {
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
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-content-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-content-background-color-top').get();

            var footer = $('#footer-content');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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

    wp.customize('afft-footer-plinth-background-color-top', function (value) {
        value.bind(function (top) {
            var bottom = wp.customize.instance('afft-footer-plinth-background-color-bottom').get();

            var footer = $('#footer-plinth');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', 'linear-gradient(' + top + ', ' + bottom + ')');
        });
    });

    wp.customize('afft-footer-plinth-background-color-bottom', function (value) {
        value.bind(function (bottom) {
            var top = wp.customize.instance('afft-footer-plinth-background-color-top').get();

            var footer = $('#footer-plinth');
            footer.css('background-color', bottom);
            footer.css('background', '-webkit-gradient(linear, 0% 0%, 0% 100%, from(' + top + '), to('+ bottom + '))');
            footer.css('background', '-webkit-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-moz-linear-gradient(top, ' + top + ', '+ bottom + ')');
            footer.css('background', '-o-linear-gradient(top, ' + top + ', '+ bottom + ')');
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
            $('#footer-social .social-btn.facebook i').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-plinth-facebook-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-facebook-background-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.facebook').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-background-color-hover', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.facebook:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-facebook-border-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.facebook').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-facebook-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.facebook').hover(function(e) {
                if(color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-facebook-border-color').get();
                if(standart === '') {
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
            $('#footer-social .social-btn.twitter i').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-plinth-twitter-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-twitter-background-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.twitter').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-twitter-background-color-hover', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.twitter:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-twitter-border-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.twitter').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-twitter-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.twitter').hover(function(e) {
                if(color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-twitter-border-color').get();
                if(standart === '') {
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
            $('#footer-social .social-btn.google-plus i').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-plinth-google-plus-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-google-plus-background-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.google-plus').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-google-plus-background-color-hover', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.google-plus:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-google-plus-border-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.google-plus').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-google-plus-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.google-plus').hover(function(e) {
                if(color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-google-plus-border-color').get();
                if(standart === '') {
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
            $('#footer-social .social-btn.pinterest i').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-plinth-pinterest-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-pinterest-background-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.pinterest').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-pinterest-background-color-hover', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.pinterest:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-pinterest-border-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.pinterest').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-pinterest-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.pinterest').hover(function(e) {
                if(color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-pinterest-border-color').get();
                if(standart === '') {
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
            $('#footer-social .social-btn.reddit i').hover(function(e) {
                var standart = wp.customize.instance('afft-footer-plinth-reddit-icon-color').get();
                var link = $(this);

                link.css('color', e.type === "mouseenter" ? color : standart);
            });
        });
    });

    wp.customize('afft-footer-plinth-reddit-background-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.reddit').css('background-color', color);
        });
    });

    wp.customize('afft-footer-plinth-reddit-background-color-hover', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('head').append('<style>#footer-social .social-btn.reddit:before { background-color: ' + color + '}</style>');
        });
    });

    wp.customize('afft-footer-plinth-reddit-border-color', function (value) {
        value.bind(function (color) {
            if(color === '') {
                color = 'transparent';
            }

            $('#footer-social .social-btn.reddit').css('border-color', color);
        });
    });

    wp.customize('afft-footer-plinth-reddit-border-color-hover', function (value) {
        value.bind(function (color) {
            $('#footer-social .social-btn.reddit').hover(function(e) {
                if(color === '') {
                    color = 'transparent';
                }

                var standart = wp.customize.instance('afft-footer-plinth-reddit-border-color').get();
                if(standart === '') {
                    color = 'transparent';
                }

                var link = $(this);

                link.css('border-color', e.type === "mouseenter" ? color : standart);
            });
        });
    });
})(jQuery);
