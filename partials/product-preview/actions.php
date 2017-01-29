<?php $shop = aff_get_product_cheapest_shop(); ?>

<?php if(!empty($shop) && !afft_is_buy_button_hidden()): ?>
    <?php if(aff_is_shop_available($shop)): ?>
        <a class="btn btn-buy btn-block" href="<?php echo $shop['tracking']['affiliate_link']; ?>" rel="nofollow" target="_blank">
            <?php echo sprintf(__('Buy now at %s', 'affilicious-theme'), $shop['name']); ?>
        </a>
    <?php else: ?>
        <a class="btn btn-not-available btn-block" href="<?php echo $shop['tracking']['affiliate_link']; ?>" rel="nofollow" target="_blank">
            <?php _e('Unfortunately not available.', 'affilicious-theme'); ?>
        </a>
    <?php endif; ?>
<?php endif; ?>

<?php if(!afft_is_test_review_button_hidden()): ?>
    <a href="<?php the_permalink() ?>" class="btn btn-review btn-block">
        <?php _e('To the test report', 'affilicious-theme'); ?>
    </a>
<?php endif; ?>

<?php if(!empty($shop)): ?>
    <small class="product-preview-updated-at text-muted">
        <?php aff_the_shop_updated_at_indication($shop); ?>
    </small>
<?php endif; ?>
