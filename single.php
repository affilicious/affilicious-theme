<?php get_header(); ?>

<main role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <?php if(aff_is_product()): ?>
                        <?php get_template_part('partials/content-product'); ?>
                    <?php else: ?>
                        <?php get_template_part('partials/content-entry'); ?>
                    <?php endif; ?>

                    <?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                        <?php comments_template(); ?>
                    <?php } ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
