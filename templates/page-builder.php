<?php
/**
 * Template Name: Page Builder
 * Template for displaying the page for a page builder.
 *
 * @since 0.7.2
 */

// For the correct translation
__('Page Builder', 'affilicious-theme');
?>

<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
