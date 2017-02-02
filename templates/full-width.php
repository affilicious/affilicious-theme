<?php
/**
 * Template Name: Full Width
 * Template for displaying the page in full width
 *
 * @since 0.7.2
 */

// For the correct translation
__('Full Width', 'affilicious-theme');
?>

<?php get_header(); ?>

<main id="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/entry'); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
