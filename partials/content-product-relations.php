
<?php $relatedProductsQuery = affilicious_get_product_related_products_query($product); ?>
<?php $relatedAccessoriesQuery = affilicious_get_product_related_accessories_query($product); ?>
<?php $relatedPostsQuery = affilicious_get_product_related_posts_query($product); ?>

<?php if(!empty($relatedProductsQuery) || !empty($relatedAccessoriesQuery) || !empty($relatedPostsQuery)): ?>
    <ul class="nav nav-tabs nav-justified">
        <li class="active">
            <a href="#related-products" data-toggle="tab">
                <?php _e('Related products', 'affilicious-theme'); ?>
            </a>
        </li>
        <li>
            <a href="#related-accessories" data-toggle="tab">
                <?php _e('Related accessories', 'affilicious-theme'); ?>
            </a>
        </li>
        <li>
            <a href="#related-posts" data-toggle="tab">
                <?php _e('Related posts', 'affilicious-theme'); ?>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="related-products">
            <?php if(!empty($relatedProductsQuery) && $relatedProductsQuery->have_posts()): ?>
                <div class="row">
                    <?php while($relatedProductsQuery->have_posts()): $relatedProductsQuery->the_post(); ?>
                        <div class="col-md-4">
                            <a href="<?php echo affilicious_get_product_link($product); ?>" rel="bookmark"
                               title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>">
                                <div class="thumbnail">
                                    <img src="<?php the_post_thumbnail_url(array(200, 200)); ?>">
                                    <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                        <p>
                                            <a href="<?php echo affilicious_get_product_affiliate_link($product); ?>"
                                               class="btn btn-buy center-block" role="button">
                                                <?php _e('Buy', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                        <p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-info center-block" role="button">
                                                <?php _e('To The Test Report', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="related-accessories">
            <?php if(!empty($relatedAccessoriesQuery) && $relatedAccessoriesQuery->have_posts()): ?>
                <div class="row">
                    <?php while($relatedAccessoriesQuery->have_posts()): $relatedAccessoriesQuery->the_post(); ?>
                        <div class="col-md-4">
                            <a href="<?php echo affilicious_get_product_link($product); ?>" rel="bookmark"
                               title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>">
                                <div class="thumbnail">
                                    <img src="<?php the_post_thumbnail_url(array(200, 200)); ?>">
                                    <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                        <p>
                                            <a href="<?php echo affilicious_get_product_affiliate_link($product); ?>"
                                               class="btn btn-buy center-block" role="button">
                                                <?php _e('Buy', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                        <p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-info center-block" role="button">
                                                <?php _e('To The Test Report', 'affilicious-theme'); ?>
                                            </a>
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="related-posts">
            <?php if(!empty($relatedPostsQuery) && $relatedPostsQuery->have_posts()): ?>
                <div class="row">
                    <?php while($relatedPostsQuery->have_posts()): $relatedPostsQuery->the_post(); ?>
                        <div class="col-md-4">
                            <a href="<?php echo affilicious_get_product_link($product); ?>" rel="bookmark"
                               title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>">
                                <div class="thumbnail">
                                    <img src="<?php the_post_thumbnail_url(array(200, 200)); ?>">
                                    <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                        <p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-info center-block" role="button">
                                                <?php _e('To The Post', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
