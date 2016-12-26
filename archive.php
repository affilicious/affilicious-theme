<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-12">
                                <?php if(aff_is_product(get_post())): ?>
                                    <?php get_template_part('partials/content-product-preview'); ?>
                                <?php else: ?>
                                    <?php get_template_part('partials/content-entry-preview'); ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <?php get_template_part('partials/content-none'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
