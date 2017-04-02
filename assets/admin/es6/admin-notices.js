(function ($) {
    $(document).on('click', '.afft-notice.is-dismissible', function() {
        var notice = $(this),
            action = notice.data('action');

        if(!action) {
            console.error("The admin notice doesn't contain any data-action attribute for the ajax call.");
            return;
        }

        $.ajax({
            url: affilicioustheme.ajax_url,
            data: {
                action: action
            }
        });
    });
})(jQuery);
