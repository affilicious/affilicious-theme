<?php if (has_category()): ?>
    <span class="entry-preview-categories">
       <?php the_category(', '); ?>
    </span>
<?php endif; ?>

<span class="entry-preview-tags">
    <?php get_template_part('partials/entry/tags'); ?>
</span>
