<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting">
    <div class="row">
        <div class="col-md-6 col-xs-12 flex-md-first flex-sm-first flex-xs-first">
            <?php if (has_post_thumbnail()): ?>
                <?php if(afft_is_post_type('product')): ?>
                    <?php $affiliateLink = aff_get_product_affiliate_link(); ?>
                    <?php $linkImageGallery = afft_link_product_preview_image(); ?>
                <?php endif; ?>
                <div style="position: relative;">
                    <a href="<?php echo !empty($linkImageGallery) && !empty($affiliateLink) ? $affiliateLink : esc_url(get_permalink()) ; ?>" rel="nofollow" target="_blank">
                        <div class="entry-thumbnail" itemprop="image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="badge-bar">
                    <span class="label label-success">
                        300 Euro
                    </span>
                    <span class="label label-info">
                        Testsieger
                    </span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 col-xs-12 flex-md-unordered flex-sm-unordered flex-xs-unordered">
            <div class="entry-details">
                <div class="entry-content">
                    <header class="entry-header">
                        <h1 class="entry-title" itemprop="headline">
                            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h1>
                    </header>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Details</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php get_template_part('partials/content-product-details'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 flex-md-last flex-sm-last flex-xs-last">
            <div class="entry-caption">
                <p>Inkl. 19% MwSt. zzgl. Versandkosten</p>
                <a class="btn btn-buy btn-block">Hier Kaufen</a>
                <a class="btn btn-info btn-block">Testbericht ansehen</a>
                <p>Aktualisiert am 13.12.16 22:34</p>
            </div>
        </div>
    </div>
</article>
