<time class="entry-preview-date" datetime="<?php the_time('Y-m-d H:i'); ?>" itemprop="datePublished">
    <span class="day"><?php the_time('j'); ?></span>
    <span class="month"><?php the_time('F'); ?></span>
    <span class="year"><?php the_time('Y'); ?></span>
</time>

<h1 class="entry-preview-title" itemprop="headline">
    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark" itemprop="url">
        <?php the_title(); ?>
    </a>
</h1>
