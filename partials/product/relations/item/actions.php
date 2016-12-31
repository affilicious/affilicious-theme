<?php if($affiliateLink = aff_get_product_affiliate_link() && $shop = aff_get_product_cheapest_shop()): ?>
    <a href="<?php echo $affiliateLink; ?>" class="btn btn-buy btn-block" rel="nofollow" target="_blank">
        <?php echo sprintf(__('Buy now at %s', 'affilicious-theme'), $shop['title']); ?>
    </a>
<?php endif; ?>

<a href="<?php the_permalink() ?>" class="btn btn-review btn-block">
    <?php _e('To The Test Report', 'affilicious-theme'); ?>
</a>

<small class="product-relations-item-updated-at text-muted">
    <?php aff_the_shop_updated_at_indication($shop); ?>
</small>
