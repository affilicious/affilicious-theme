<?php if(aff_has_product_related_products()): ?>
    <div class="product-relations product-relations-product">
        <?php get_template_part('partials/product/relations/product'); ?>
    </div>
<?php endif; ?>

<?php if(aff_has_product_related_accessories()): ?>
    <div class="product-relations product-relations-accessory">
        <?php get_template_part('partials/product/relations/accessory'); ?>
    </div>
<?php endif; ?>
