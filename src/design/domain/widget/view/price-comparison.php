<?php $shops = aff_get_product_shops(); ?>

<?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<div class="panel-body">
    <div class="price-comparison price-comparison-widget">
        <?php foreach ($shops as $shop): ?>

            <div class="shop-thumbnail">
                <?php if(isset($shop['thumbnail'])): ?>
                    <?php echo wp_get_attachment_image($shop['thumbnail']['id'], 'small'); ?>
                <?php else: ?>
                    <p><?php echo $shop['title']; ?></p>
                <?php endif; ?>
            </div>
            <div class="shop">
                <div class="shop-price">
                    <?php if($price = $shop['price']): ?>
                        <div class="price">
                            <?php if($old_price = $shop['old_price']): ?>

                                <?php if(function_exists('aff_should_shop_display_old_price')): ?>
                                    <?php if(aff_should_shop_display_old_price($shop)): ?>
                                        <span class="old-price"><?php echo $old_price['value'] . ' ' . $old_price['currency']['symbol'] ?></span>
                                    <?php endif; ?>
                                <?php else: // Legacy support ?>
                                    <span class="old-price"><?php echo $old_price['value'] . ' ' . $old_price['currency']['symbol'] ?></span>
                                <?php endif; ?>

                            <?php endif; ?>
                            <span class="current-price"><?php echo $price['value'] . ' ' . $price['currency']['symbol'] ?></span>
                        </div>
                        <p class="price-tax text-muted">
                            <?php if(function_exists('aff_the_shop_price_indication')): ?>
                                <?php aff_the_shop_price_indication(); ?>
                            <?php else: // Legacy support ?>
                                <?php _e('Incl. 19 % VAT and excl. shipping costs.', 'affilicious-theme'); ?>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="shop-buy">
                    <?php if(function_exists('aff_is_shop_available')): ?>

                        <?php if(aff_is_shop_available($shop)): ?>
                            <a class="btn btn-buy" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                                <?php _e('Buy', 'affilicious-theme'); ?>
                            </a>
                        <?php else: ?>
                            <a class="btn btn-default" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                                <?php _e('Not available', 'affilicious-theme'); ?>
                            </a>
                        <?php endif; ?>

                    <?php else: // Legacy support ?>

                        <a class="btn btn-buy" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                            <?php esc_html_e('Buy', 'affilicious-theme'); ?>
                        </a>

                    <?php endif; ?>
                    <div class="shop-updated-at">
                        <?php if(function_exists('aff_the_shop_updated_at_indication')): ?>
                            <?php aff_the_shop_updated_at_indication($shop); ?>
                        <?php else: // Legacy support ?>
                            <?php if(isset($shop['updated_at']) && $updated_at = $shop['updated_at']): ?>
                                <p class="text-muted">
                                    <?php echo sprintf(
                                        __('Updated at %s.', 'affilicious-theme'),
                                        $updated_at
                                    ); ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
