<div class="product-relations-item-thumbnail <?php if(!has_post_thumbnail()): ?>product-relations-item-no-thumbnail<?php endif; ?>">
    <?php get_template_part('partials/product/relations/item/thumbnail'); ?>

    <?php if(aff_has_product_price() || aff_has_product_tags()): ?>
        <div class="product-relations-item-tag-bar">
            <?php get_template_part('partials/product/relations/item/bar'); ?>
        </div>
    <?php endif; ?>
</div>

<?php if(aff_has_product_price()): ?>
    <small class="product-relations-item-price-indication text-muted">
        <?php aff_the_shop_price_indication(); ?>
    </small>
<?php endif; ?>
