<?php if (has_category()): ?>
    <span class="entry-preview-categories">
       <?php the_category(', '); ?>
    </span>
<?php endif; ?>

<span class="entry-preview-tags">
    <?php the_tags(
        '<span class="label label-default label-md">',
        '</span><span class="label label-default label-md">',
        '</span>');
    ?>
</span>
