<div class="product-preview-thumbnail <?php if(!has_post_thumbnail()): ?>product-preview-no-thumbnail<?php endif; ?>">
    <?php get_template_part('partials/product-preview/thumbnail'); ?>

    <div class="product-preview-badge-bar">
        <span class="product-preview-badge-item label label-success">300.00 €</span>
        <span class="product-preview-badge-item label label-info">Testsieger</span>
    </div>
</div>

<small class="product-preview-price-indication text-muted">
    <?php aff_the_shop_price_indication(); ?>
</small>
