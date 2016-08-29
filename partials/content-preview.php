<?php do_action('affilicious_theme_preview_above_post'); ?>


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
    </header>
    <?php if (has_post_thumbnail()): ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    <div class="panel-body">
        <?php the_content(); ?>
    </div>
</article>



<div class="jumbotron">
    <?php if (has_post_thumbnail()): ?>
        <div class="jumbotron-photo">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <div class="jumbotron-contents">
        <h1>Implementing the HTML and CSS into your user interface project</h1>
        <?php the_excerpt(); ?>
    </div>
</div>










<!--<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
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
</article>-->

<?php do_action('affilicious_theme_preview_below_post'); ?>
