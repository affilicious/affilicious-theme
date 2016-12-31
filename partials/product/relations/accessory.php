<h3 class="product-relations-headline product-relations-accessory-headline">
    <?php _e('Related accessories', 'affilicious-theme'); ?>
</h3>

<div class="slick-container">
    <div class="slick-relations-gallery">
        <?php $relatedAccessoriesQuery = aff_get_product_related_accessories_query(); ?>
        <?php if(!empty($relatedAccessoriesQuery) && $relatedAccessoriesQuery->have_posts()): ?>
            <?php while($relatedAccessoriesQuery->have_posts()): $relatedAccessoriesQuery->the_post(); ?>
                <div class="product-relations-item product-relations-accessory-item slick-slide">
                    <?php get_template_part('partials/product/relations/item'); ?>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>
</div>
