declare var jQuery: any;
declare var wp: any;

jQuery(function($) {
    $(function () {
        $("[rel='tooltip']").tooltip();
    });


    // Vertically center images in slider container when image height is greater than container height (larger screens)
   /* function verticallyCenterImages() {

        var containerHeight = $('.flexslider').height();

        $('.flexslider .slides li').each(function() {

            var image = $(this).find('img');
            var imageHeight = image.height();


            image.css("top", "initial"); // reset for window resize

            console.log(containerHeight);
            console.log(imageHeight);



            if (imageHeight > containerHeight) {
                var verticalShift = (containerHeight - imageHeight) / 2;

                image.css("top", verticalShift + "px");
            }
        });
    }*/

    $(document).ready(function() {
        $('.thumb-slider .slick-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            focusOnSelect: true,
            adaptiveHeight: true,
            asNavFor: '.portfolio-slider .slick-slider'
        });

        $('.portfolio-slider .slick-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.thumb-slider .slick-slider',
        });

        var container = $('.portfolio-slider');
        var content = $('.portfolio-slider .slick-list');
        var containerHeight = container.height();
        var contentHeight = content.height();

        console.log(containerHeight);
        console.log(contentHeight);

        if (containerHeight > contentHeight) {
            content.css('margin-top', (containerHeight - contentHeight) / 2);
        }
    });

    /*$(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            start: function() {

            // Vertically center flexslider slides.
                // Get container size.
                var maxHeight = $('.flexslider .slides').height();
                console.log(maxHeight);
                $('.flexslider .slides li').each(function() {
                    // Each slide's height.
                    var slideHeight = $(this).height();
                    // Calculate top padding of each slide as half the difference between
                    // its height and the container height.
                    $(this).css('padding-top', (maxHeight - slideHeight)/2);
                });
            }
        });
    });*/


    $(window).resize(function() {
        //verticallyCenterImages();
    });
});
