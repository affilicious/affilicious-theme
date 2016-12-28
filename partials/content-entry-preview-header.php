<h1 class="entry-preview-title" itemprop="headline">
    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
        <?php the_title(); ?>
    </a>
</h1>

<?php if(!is_front_page() && !is_page()): ?>
    <ul class="entry-preview-meta">
        <li class="entry-preview-date" itemprop="datePublished">
            <?php the_time(get_option('date_format')); ?>
        </li>

        <?php if (has_category()): ?>
            <li class="entry-preview-category">
                <?php the_category(', '); ?>
            </li>
        <?php endif; ?>

        <?php if(get_the_author() !== null): ?>
            <li class="entry-preview-author" itemscope
                itemtype="http://schema.org/Person" itemprop="author">
                <?php the_author(); ?>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
