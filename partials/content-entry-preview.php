<?php $product = aff_get_product(); ?>
<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting">
    <div class="row">
        <div class="col-md-6 col-xs-12 flex-md-first flex-sm-first flex-xs-first">
            <?php if (has_post_thumbnail()): ?>
                <?php if(afft_is_post_type('product')): ?>
                    <?php $affiliateLink = aff_get_product_affiliate_link(); ?>
                    <?php $linkImageGallery = afft_link_product_preview_image(); ?>
                <?php endif; ?>
                <div class="entry-teaser">
                    <div class="entry-thumbnail" itemprop="image">
                        <a href="<?php echo !empty($linkImageGallery) && !empty($affiliateLink) ? $affiliateLink : esc_url(get_permalink()) ; ?>" rel="nofollow" target="_blank">
                            <?php the_post_thumbnail(); ?>
                        </a>

                        <div class="entry-badge-bar">
                            <span class="entry-badge-item label label-success">300 Euro</span>
                            <span class="entry-badge-item label label-info">Testsieger</span>
                        </div>
                    </div>

                    <small class="entry-price-indication">Inkl. 19% MwSt. zzgl. Versandkosten</small>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-6 col-xs-12 flex-md-unordered flex-sm-unordered flex-xs-unordered">
            <div class="entry-content">
                <div class="entry-header">
                    <h1 class="entry-title" itemprop="headline">
                        <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                </div>
                <div class="entry-accordion panel-group" id="accordion-<?php the_ID(); ?>">
                    <div class="entry-accordion-item entry-details panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-parent="#accordion-<?php the_ID(); ?>" href="#collapse-<?php the_ID(); ?>" data-toggle="collapse" >
                                    Details
                                </a>
                            </h2>
                        </div>
                        <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php get_template_part('partials/content-product-details'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 flex-md-last flex-sm-last flex-xs-last">
            <div class="entry-info">
                <a class="btn btn-buy btn-block">Jetzt bei Amazon kaufen</a>
                <a class="btn btn-info btn-block">Testbericht ansehen</a>
                <small class="entry-updated-at">Aktualisiert am 13.12.16 22:34</small>
            </div>
        </div>
    </div>
</article>
