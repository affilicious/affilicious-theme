<?php $product = aff_get_product(); ?>
<article id="product-preview-<?php the_ID(); ?>" <?php post_class('product-preview'); ?>
         role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <div class="product-preview-teaser">
        <?php get_template_part('partials/product-preview/teaser'); ?>
    </div>

    <div class="product-preview-content">
        <?php get_template_part('partials/product-preview/content'); ?>
    </div>

    <div class="product-preview-actions">
        <?php get_template_part('partials/product-preview/actions'); ?>
    </div>

</article>
