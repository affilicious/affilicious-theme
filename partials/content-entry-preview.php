<article id="entry-preview-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting">

    <div class="entry-preview-thumbnail <?php if(!has_post_thumbnail()): ?>entry-preview-no-thumbnail<?php endif; ?>">
        <?php get_template_part('partials/content-entry-preview-thumbnail'); ?>
    </div>

    <header class="entry-preview-header">
        <?php get_template_part('partials/content-entry-preview-header'); ?>
    </header>

</article>
