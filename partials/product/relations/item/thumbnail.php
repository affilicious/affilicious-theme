<?php if(has_post_thumbnail()): ?>
    <?php $affiliateLink = aff_get_product_affiliate_link(); ?>
    <?php $linkPreviewImage = afft_link_product_preview_image(); ?>

    <?php if($linkPreviewImage): ?>
        <a href="<?php echo $affiliateLink; ?>" rel="bookmark"
        title="<?php echo sprintf(__('Link to %s', 'affilicious-theme'), the_title_attribute()); ?>" itemprop="isRelatedTo">
    <?php endif; ?>

    <img src="<?php the_post_thumbnail_url(); ?>">

    <?php if($linkPreviewImage): ?>
        </a>
    <?php endif; ?>
<?php else: ?>
    <?php get_template_part('partials/misc/no-thumbnail'); ?>
<?php endif; ?>
