<?php if (has_post_thumbnail()): ?>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('post-thumbnail', array(
            'itemprop' => 'image'
        )); ?>
    </a>
<?php else: ?>
    <?php get_template_part('partials/content-no-thumbnail'); ?>
<?php endif; ?>
