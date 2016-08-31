<?php $shops = affilicious_get_product_shops(); ?>

<?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<div class="panel-body">
    <div class="price-comparison price-comparison-widget">
        <?php foreach ($shops as $shop): ?>
            <div class="shop">
                <div class="shop-thumbnail">
                    <?php echo affilicious_get_shop_thumbnail($shop['shop_id']); ?>
                </div>
                <div class="shop-price">
                    <?php if($price = affilicious_get_price($shop['price'], $shop['currency'])): ?>
                        <div class="price">
                            <?php if($oldPrice = affilicious_get_price($shop['old_price'], $shop['currency'])): ?>
                                <span class="old-price"><?php echo $oldPrice ?></span>
                            <?php endif; ?>
                            <span class="current-price"><?php echo $price; ?></span>
                        </div>
                        <p class="price-tax text-muted">
                            <?php _e('Including 19 % VAT', 'affilicious-theme'); ?>
                        </p>
                    <?php else: ?>
                        <p>lala</p>
                    <?php endif; ?>
                </div>
                <div class="shop-buy">
                    <a class="btn btn-buy" href="<?php echo $shop['affiliate_link']; ?>">
                        <?php esc_html_e('Buy', 'affilicious-theme'); ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
