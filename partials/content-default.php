





<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <header class="entry-header">
        <?php if (!is_front_page() && has_category()): ?>
            <span class="entry-category"><?php the_category(', '); ?></span>
        <?php endif; ?>
        <h1 class="entry-title">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h1>
        <?php if (has_post_thumbnail()): ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
    </header>
    <div class="entry-body">
        <?php the_content(); ?>
    </div>
</article>


