<article id="entry-preview-<?php the_ID(); ?>" <?php post_class('entry-preview'); ?>
         role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="entry-preview-header">
        <?php get_template_part('partials/entry-preview/header'); ?>
    </header>

    <div class="entry-preview-teaser">
        <?php get_template_part('partials/entry-preview/teaser'); ?>
    </div>

</article>
