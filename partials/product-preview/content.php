<header class="product-preview-header">
    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
        <h1 class="product-preview-title" itemprop="headline">
            <?php the_title(); ?>
        </h1>
    </a>
</header>

<section id="accordion">
    <input type="checkbox" id="#product-preview-<?php the_ID(); ?>"/>
    <label for="#product-preview-<?php the_ID(); ?>"><?php _e('Details', 'affilicious-theme')?><i class="fa fa-plus"></i></label>
    <div class="accordion-content">
        <?php get_template_part('partials/product/details'); ?>
    </div>
</section>
