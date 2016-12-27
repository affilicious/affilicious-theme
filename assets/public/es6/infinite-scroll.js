(function($){
    var ias = $.ias({
        container:  '.ias-container',
        item:       '.ias-item',
        pagination: '.ias-pagination',
        next:       '.ias-nav-next a'
    });

    ias.extension(new IASSpinnerExtension({
        html: '<div class="col-md-12"><div class="ias-spinner-container"><div class="ias-spinner"><img src="{src}"/></div></div></div>'
    }));

    ias.extension(new IASNoneLeftExtension({
        text: translations.noMoreResults,
        html: '<div class="col-md-12"><div class="ias-end-container"><p class="ias-end">{text}</p></div></div>'
    }));
})(jQuery);
