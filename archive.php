<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="posts">
                        <?php
                        $args = array (
                            'post_type'              => 'aff_product',
                            'post_status'            => 'publish',
                            'pagination'             => true,
                            'paged'                  => (get_query_var('paged') ? get_query_var('paged') : 1),
                            'posts_per_page'         => 6,
                            'order'                  => 'ASC',
                            'orderby'                => 'date',
                        ); ?>
                        <?php $wp_query = new WP_Query($args); ?>
                        <?php if ($wp_query->have_posts()):; ?>
                            <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                                <div class="col-md-12">
                                    <div class="post">
                                        <?php if(aff_is_product(get_post())): ?>
                                            <?php get_template_part('partials/content-product-preview'); ?>
                                        <?php else: ?>
                                            <?php get_template_part('partials/content-entry-preview'); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <div id="pagination">
                                <div class="nav-previous alignleft"><?php next_posts_link( 'Ältere Beiträge' ); ?></div>
                                <div class="nav-next alignright next"><?php previous_posts_link( 'Neuere Beiträge' ); ?></div>
                            </div>
                        <?php else: ?>
                        <div class="col-md-12">
                            <?php get_template_part('partials/content-not-found'); ?>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
