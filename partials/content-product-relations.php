<?php $product = aff_get_product(); ?>
<?php $relatedProductsQuery = aff_get_product_related_products_query($product); ?>
<?php $relatedAccessoriesQuery = aff_get_product_related_accessories_query($product); ?>

<?php if(!empty($relatedProductsQuery) || !empty($relatedAccessoriesQuery)): ?>
    <div class="panel">
        <ul class="nav nav-tabs nav-justified">
            <?php if(!empty($relatedProductsQuery)): ?>
                <li class="active">
                    <a href="#related-products" data-toggle="tab">
                        <?php _e('Related products', 'affilicious-theme'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(!empty($relatedAccessoriesQuery)): ?>
                <li <?php if(empty($relatedProductsQuery)) echo 'class="active"'; ?>>
                    <a href="#related-accessories" data-toggle="tab">
                        <?php _e('Related accessories', 'affilicious-theme'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content">
            <?php if(!empty($relatedProductsQuery)): ?>
                <div class="tab-pane fade in active" id="related-products">
                <?php if(!empty($relatedProductsQuery) && $relatedProductsQuery->have_posts()): ?>
                    <div class="row">
                        <?php while($relatedProductsQuery->have_posts()): $relatedProductsQuery->the_post(); ?>
                        <?php $affiliateLink = aff_get_product_affiliate_link($relatedProductsQuery->post); ?>

                            <div class="col-md-4">
                                <div class="thumbnail">

                                    <?php if(has_post_thumbnail()): ?>
                                        <?php $linkPreviewImage = afft_link_product_preview_image(); ?>

                                        <?php if($linkPreviewImage): ?>
                                            <a href="<?php echo $affiliateLink; ?>" rel="bookmark"
                                               title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>" itemprop="isRelatedTo">
                                        <?php endif; ?>

                                        <img src="<?php the_post_thumbnail_url(array(200, 200)); ?>">

                                        <?php if($linkPreviewImage): ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                        <?php if(!empty($affiliateLink)): ?>
                                            <p>
                                                <a href="<?php echo $affiliateLink; ?>" class="btn btn-buy center-block"
                                                   role="button" rel="nofollow" target="_blank">
                                                    <?php _e('Buy', 'affilicious-theme'); ?>
                                                </a>
                                            </p>
                                        <?php endif; ?>
                                        <p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-review center-block" role="button">
                                                <?php _e('To The Test Report', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if(!empty($relatedAccessoriesQuery)): ?>
                <div class="tab-pane fade <?php if(empty($relatedProductsQuery)) echo 'in active'; ?>" id="related-accessories">
                <?php if(!empty($relatedAccessoriesQuery) && $relatedAccessoriesQuery->have_posts()): ?>
                    <div class="row">
                        <?php while($relatedAccessoriesQuery->have_posts()): $relatedAccessoriesQuery->the_post(); ?>
                            <?php $affiliateLink = aff_get_product_link($relatedAccessoriesQuery->post); ?>

                            <div class="col-md-4">
                                <div class="thumbnail">

                                    <?php if(has_post_thumbnail()): ?>
                                        <?php $linkPreviewImage = afft_link_product_preview_image(); ?>

                                        <?php if($linkPreviewImage): ?>
                                            <a href="<?php echo $affiliateLink; ?>" rel="bookmark"
                                            title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>" itemprop="isRelatedTo">
                                        <?php endif; ?>

                                        <img src="<?php the_post_thumbnail_url(array(200, 200)); ?>">

                                        <?php if($linkPreviewImage): ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="caption">
                                        <h5><?php the_title(); ?></h5>
                                        <?php if(!empty($affiliateLink)): ?>
                                            <p>
                                                <a href="<?php echo $affiliateLink; ?>" class="btn btn-buy center-block"
                                                   role="button" rel="nofollow" target="_blank">
                                                    <?php _e('Buy', 'affilicious-theme'); ?>
                                                </a>
                                            </p>
                                        <?php endif; ?>
                                        <p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-review center-block" role="button">
                                                <?php _e('To The Test Report', 'affilicious-theme'); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
