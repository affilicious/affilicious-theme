<?php if(!is_page() || has_post_thumbnail()): ?>
    <div class="entry-thumbnail <?php if(!has_post_thumbnail()): ?>entry-no-thumbnail<?php endif; ?>">
        <?php get_template_part('partials/entry/thumbnail'); ?>
    </div>
<?php endif; ?>

<?php if(!is_page()): ?>
    <footer class="entry-bar">
        <?php get_template_part('partials/entry/bar'); ?>
    </footer>
<?php endif; ?>
