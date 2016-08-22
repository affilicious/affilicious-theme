<?php get_header(); ?>

<main role="main">
    <?php if (affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/content-default'); ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
</main>

<?php get_footer(); ?>