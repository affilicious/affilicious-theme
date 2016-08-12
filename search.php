<?php get_header(); ?>

<main role="main" class="search">
    <?php if (affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
        <div class="row">
            <div class="col-md-8">
                <?php do_action('affilicious_theme_search_above_posts'); ?>

                <?php if (have_posts()) : ?>
                    <div class="row">
                        <?php $count = 0; ?>
                        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                            <?php $count++; ?>
                            <div class="col-md-6">
                                <?php get_template_part('partials/content-preview'); ?>
                            </div>
                            <?php if($count % 2 == 0): ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part('partials/content-none'); ?>
                <?php endif; ?>

                <?php do_action('affilicious_theme_search_below_posts'); ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
</main>

<?php get_footer(); ?>
