<div class="product-preview-thumbnail <?php if(!has_post_thumbnail()): ?>product-preview-no-thumbnail<?php endif; ?>">
    <?php get_template_part('partials/product-preview/thumbnail'); ?>

    <?php if(aff_has_product_price() || aff_has_product_tags()): ?>
        <div class="product-preview-tag-bar">
            <?php aff_the_product_tags(null, '<span class="product-preview-tag-item tag">', '</span>'); ?>

            <?php if(aff_has_product_price()): ?>
                <span class="product-preview-tag-item tag tag-price"><?php aff_the_product_price(); ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php if(aff_has_product_price()): ?>
    <small class="product-preview-price-indication text-muted">
        <?php aff_the_shop_price_indication(); ?>
    </small>
<?php endif; ?>
