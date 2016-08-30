<?php get_header(); ?>

<main role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <?php if (affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('partials/content-entry'); ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php get_template_part('partials/content-none'); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
</main>

<?php get_footer(); ?>
