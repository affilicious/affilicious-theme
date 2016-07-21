<?php $product = new AP_Product(get_the_ID()); ?>

<article id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
    <header class="product-header box">
        <h1 class="product-title"><?php the_title(); ?></h1>
        <div class="product-thumbnail">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>
        </div>
    </header>

    <section class="product-body box">
        <?php the_content(); ?>
    </section>

    <!--<footer class="product-footer box"></footer>-->
</article>
