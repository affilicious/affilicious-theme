<?php if (has_post_thumbnail()): ?>
    <?php $affiliateLink = aff_get_product_affiliate_link(); ?>
    <?php $linkImageGallery = afft_link_product_preview_image(); ?>

    <a href="<?php echo !empty($linkImageGallery) && !empty($affiliateLink) ? $affiliateLink : esc_url(get_permalink()) ; ?>" rel="nofollow" target="_blank">
        <?php the_post_thumbnail('post-thumbnail', array(
            'itemprop' => 'image'
        )); ?>
    </a>
<?php else: ?>
    <?php get_template_part('partials/misc/no-thumbnail'); ?>
<?php endif; ?>
