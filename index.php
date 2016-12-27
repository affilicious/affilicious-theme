<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if(aff_is_product_page()): ?>
                            <?php get_template_part('partials/content-product-preview'); ?>
                        <?php else: ?>
                            <?php get_template_part('partials/content-entry-preview'); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php get_template_part('partials/content-not-found'); ?>
                <?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
