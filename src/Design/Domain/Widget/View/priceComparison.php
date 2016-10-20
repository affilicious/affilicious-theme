<?php $shops = aff_get_product_shops(); ?>

<?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<div class="panel-body">
    <div class="price-comparison price-comparison-widget">
        <?php foreach ($shops as $shop): ?>
            <div class="shop">
                <div class="shop-thumbnail">
                    <?php if(isset($shop['thumbnail'])): ?>
                        <?php echo wp_get_attachment_image($shop['thumbnail']['id'], 'small'); ?>
                    <?php else: ?>
                        <p><?php echo $shop['title']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="shop-price">
                    <?php if($price = $shop['price']): ?>
                        <div class="price">
                            <?php if($oldPrice = $shop['old_price']): ?>
                                <span class="old-price"><?php echo $oldPrice['value'] . ' ' . $oldPrice['currency']['symbol'] ?></span>
                            <?php endif; ?>
                            <span class="current-price"><?php echo $price['value'] . ' ' . $price['currency']['symbol'] ?></span>
                        </div>
                        <p class="price-tax text-muted">
                            <?php _e('Including 19 % VAT', 'affilicious-theme'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="shop-buy">
                    <a class="btn btn-buy" href="<?php echo $shop['affiliate_link']; ?>"  rel="nofollow" target="_blank">
                        <?php esc_html_e('Buy', 'affilicious-theme'); ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
