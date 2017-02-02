<?php
/**
 * Template Name: Sidebar Right
 * Template for displaying the page with a sidebar on the right site.
 *
 * @since 0.7.2
 */

// For the correct translation
__('Sidebar Right', 'affilicious-theme');
?>

<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/entry'); ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

