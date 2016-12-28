<?php get_header(); ?>

<main role="main" class="search">
   <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) : ?>
                    <div class="row">
                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                            <div class="col-md-12">
                                <?php if(aff_is_product()): ?>
                                    <?php get_template_part('partials/content-product-preview'); ?>
                                <?php else: ?>
                                    <?php get_template_part('partials/content-entry-preview'); ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part('partials/content-empty-search'); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
