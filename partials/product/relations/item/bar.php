<?php aff_the_product_tags(null, '<span class="product-preview-tag-item tag">', '</span>'); ?>

<?php if(aff_has_product_price()): ?>
    <span class="product-preview-tag-item tag tag-price"><?php aff_the_product_price(); ?></span>
<?php endif; ?>
