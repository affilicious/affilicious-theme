<article id="entry-preview-<?php the_ID(); ?>" <?php post_class('entry'); ?>
         role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="entry-preview-header">
        <?php get_template_part('partials/content-entry-preview-header'); ?>
    </header>

    <div class="entry-preview-body">
        <?php get_template_part('partials/content-entry-preview-body'); ?>
    </div>

</article>
