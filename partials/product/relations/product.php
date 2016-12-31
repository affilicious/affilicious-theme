<h3 class="product-relations-headline product-relations-product-headline">
    <?php _e('Related products', 'affilicious-theme'); ?>
</h3>

<div class="slick-container">
    <div class="slick-relations-gallery">
        <?php $relatedProductsQuery = aff_get_product_related_products_query(); ?>
        <?php if(!empty($relatedProductsQuery) && $relatedProductsQuery->have_posts()): ?>
            <?php while($relatedProductsQuery->have_posts()): $relatedProductsQuery->the_post(); ?>
                <div class="product-relations-item product-relations-product-item slick-slide">
                    <?php get_template_part('partials/product/relations/item'); ?>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>
</div>
