<article id="empty-search">
    <header id="empty-search-header">
        <i id="empty-search-icon" class="fa fa-search" aria-hidden="true"></i>
        <h1 id="empty-search-headline"><?php _e('No search results', 'affilicious-theme'); ?></h1>
    </header>

    <section id="empty-search-body">
        <p id="empty-search-text"><?php echo sprintf(__('Sorry, but there are no results for "%s".', 'affilicious-theme'), get_search_query()); ?></p>

        <div id="empty-search-search">
            <?php get_search_form(); ?>
        </div>
    </section>
</article>
