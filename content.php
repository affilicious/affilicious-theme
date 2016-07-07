<?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-thumbnail">
            <?php if(has_post_thumbnail()): the_post_thumbnail(); endif; ?>
        </div>
        <div class="post-body">
            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <ul class="post-meta">
                    <li>
                        <time><?php the_date('d.m.Y'); ?></time>
                    </li>
                    <li>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
                            <?php echo get_the_author_meta('display_name'); ?>
                        </a>
                    </li>
                    <li>
                        <?php the_category(', '); ?>
                    </li>
                </ul>
            </header>
            <div class="post">
                <?php the_content(); ?>
            </div>
        </div>
        <footer class="post-footer">
            <?php the_post_navigation(); ?>
        </footer>
    </article>
<?php endwhile; endif; ?>
