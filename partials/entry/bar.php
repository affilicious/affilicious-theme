<?php if (has_category()): ?>
    <span class="entry-categories">
       <?php the_category(', '); ?>
    </span>
<?php endif; ?>

<span class="entry-tags">
    <?php get_template_part('partials/entry/tags'); ?>
</span>
