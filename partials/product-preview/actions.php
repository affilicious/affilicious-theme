<?php $shop = aff_get_product_cheapest_shop(); ?>

<?php if(aff_has_product_shops()): ?>
    <?php if(aff_is_shop_available($shop)): ?>
        <a class="btn btn-buy btn-block" href="<?php echo $shop['affiliate_link']; ?>" rel="nofollow" target="_blank">
            <?php echo sprintf(__('Buy now at %s', 'affilicious-theme'), $shop['title']); ?>
        </a>
    <?php else: ?>
        <a class="btn btn-default btn-block" href="<?php echo $shop['affiliate_link']; ?>" rel="nofollow" target="_blank">
            <?php _e('Unfortunately not available.', 'affilicious-theme'); ?>
        </a>
    <?php endif; ?>
<?php endif; ?>

<a href="<?php the_permalink() ?>" class="btn btn-info btn-block">
    <?php _e('To the review', 'affilicious-theme'); ?>
</a>

<small class="product-preview-updated-at text-muted">
    <?php aff_the_shop_updated_at_indication($shop); ?>
</small>
