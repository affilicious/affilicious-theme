<header class="product-preview-header">
    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
        <h1 class="product-preview-title" itemprop="headline">
            <?php the_title(); ?>
        </h1>
    </a>
</header>

<?php get_template_part('partials/content-product-details'); ?>
