<?php if(aff_has_product_shops()): ?>
    <?php $shops = aff_get_product_shops(); ?>

    <div class="widget">
        <div class="widget-body">
            <div id="price-comparison">
                <?php foreach ($shops as $shop): ?>
                    <div class="shop <?php if(!aff_is_shop_available($shop)): ?>not-available<?php endif; ?>">
                        <div class="row">
                            <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="shop-thumbnail">
                                    <?php if(isset($shop['thumbnail'])): ?>
                                        <?php echo wp_get_attachment_image($shop['thumbnail']['id'], 'small'); ?>
                                    <?php else: ?>
                                        <p><?php echo $shop['title']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="shop-info">
                                    <?php if(aff_is_shop_available($shop) && $price = $shop['price']): ?>
                                        <div class="shop-price">
                                            <?php if($old_price = $shop['old_price']): ?>
                                                <?php if(aff_should_shop_display_old_price($shop)): ?>
                                                    <span class="shop-price-old old-price"><?php echo $old_price['value'] . ' ' . $old_price['currency']['symbol'] ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <span class="shop-price-current current-price"><?php echo $price['value'] . ' ' . $price['currency']['symbol'] ?></span>
                                        </div>

                                        <small class="shop-price-indication text-muted">
                                            <?php aff_the_shop_price_indication(); ?>
                                        </small>
                                    <?php else: ?>
                                        <small class="shop-no-info text-muted">
                                            <?php _e('No information available.', 'affilicious-theme'); ?>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="shop-buy">
                                    <?php if(aff_is_shop_available($shop)): ?>
                                        <a class="btn btn-buy" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                                            <?php echo sprintf(__('Buy now at %s', 'affilicious-theme'), $shop['title']); ?>
                                        </a>
                                    <?php else: ?>
                                        <a class="btn btn-not-available" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                                            <?php _e('Unfortunately not available.', 'affilicious-theme'); ?>
                                        </a>
                                    <?php endif; ?>

                                    <small class="shop-updated-at text-muted">
                                        <?php aff_the_shop_updated_at_indication($shop); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

