<article id="entry-<?php the_ID(); ?>" <?php post_class('entry'); ?> role="article"
         itemscope itemtype="http://schema.org/BlogPosting">

    <?php if (has_post_thumbnail()): ?>
        <div class="entry-thumbnail" itemprop="image">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <h1 class="entry-title" itemprop="headline">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h1>

        <?php if(!is_front_page() && !is_page()): ?>
            <ul class="entry-meta">
                <li class="entry-date" itemprop="datePublished">
                    <?php the_time(get_option('date_format')); ?>
                </li>

                <?php if (has_category()): ?>
                    <li class="entry-category">
                        <?php the_category(', '); ?>
                    </li>
                <?php endif; ?>

                <?php if(get_the_author() !== null): ?>
                    <li class="entry-author" itemscope
                        itemtype="http://schema.org/Person" itemprop="author">
                        <?php the_author(); ?>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </header>
</article>
