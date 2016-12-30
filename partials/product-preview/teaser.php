<div class="product-preview-thumbnail <?php if(!has_post_thumbnail()): ?>product-preview-no-thumbnail<?php endif; ?>">
    <?php get_template_part('partials/product-preview/thumbnail'); ?>

    <div class="product-preview-tag-bar">
        <?php
            aff_the_product_tags(
                null,
                '<span class="product-preview-tag-item tag">',
                '</span>'
            );
        ?>

        <span class="product-preview-tag-item tag tag-price">300.00 €</span>
    </div>

</div>

<small class="product-preview-price-indication text-muted">
    <?php aff_the_shop_price_indication(); ?>
</small>
