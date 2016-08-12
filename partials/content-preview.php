<?php do_action('affilicious_theme_preview_above_post'); ?>

<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <div class="entry-thumbnail">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
    </div>
    <header class="entry-header">
        <div class="entry-avatar">
            <?php echo get_avatar(get_the_author_meta('ID')); ?>
        </div>
        <h1 class="entry-title">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h1>
    </header>
    <div class="entry-body">
        <?php the_excerpt(); ?>
    </div>
    <footer class="entry-footer">
        <ul class="entry-meta">
            <li class="entry-author">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
                    <?php echo get_the_author_meta('display_name'); ?>
                </a>
            </li>
            <li class="entry-date">
                <time><?php the_date('d.m.Y'); ?></time>
            </li>
            <?php $post_link = get_edit_post_link(); ?>
            <?php if(!empty($post_link )): ?>
                <?php edit_post_link(__('Edit', 'affilicious-theme'), '<li class="entry-edit-link">', '</li>'); ?>
            <?php endif; ?>
        </ul>
    </footer>
</article>

<?php do_action('affilicious_theme_preview_below_post'); ?>
