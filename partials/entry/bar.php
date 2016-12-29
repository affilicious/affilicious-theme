<?php if (has_category()): ?>
    <span class="entry-categories">
       <?php the_category(', '); ?>
    </span>
<?php endif; ?>

<span class="entry-tags">
    <?php the_tags(
        '<span class="label label-default label-md">',
        '</span><span class="label label-default label-md">',
        '</span>');
    ?>
</span>
