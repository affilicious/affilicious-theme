<?php get_header(); ?>

<main role="main">
    <?php if (affilicious_theme_is_loose_layout()): ?><div class="container"><?php endif; ?>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="row">
                    <?php if (have_posts()): ?>
                        <?php $count = 0; ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $count++; ?>

                            <div class="col-md-6">
                                <?php get_template_part('partials/content-preview'); ?>
                            </div>

                            <?php if($count % 2 == 0): ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-md-6">
                            <?php get_template_part('partials/content-none'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php if (affilicious_theme_is_loose_layout()): ?></div><?php endif; ?>
</main>

<?php get_footer(); ?>
