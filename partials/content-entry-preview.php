<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting">

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

    <header class="entry-header">
        <h1 class="entry-title" itemprop="headline">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h1>

        <?php if(!is_front_page() && !is_page()): ?>
            <ul class="entry-meta">
                <li class="entry-date" itemprop="datePublished">
                    <?php the_time(get_option('date_format')); ?>
                </li>

                <?php if (has_category()): ?>
                    <li class="entry-category">
                        <?php the_category(', '); ?>
                    </li>
                <?php endif; ?>

                <?php if(get_the_author() !== null): ?>
                    <li class="entry-author" itemscope
                        itemtype="http://schema.org/Person" itemprop="author">
                        <?php the_author(); ?>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            Auszug</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php if(has_excerpt()): ?>
                            <div class="product-excerpt" itemprop="description">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
