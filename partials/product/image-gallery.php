<?php $product = aff_get_product(); ?>
<?php $affiliateLink = aff_get_product_affiliate_link($product); ?>

<?php if($imageGallery = aff_get_product_image_gallery($product)): ?>
    <div id="product-image-gallery">
        <div class="slick-container">
            <div class="slick-product-gallery">
                <?php $linkImageGallery = afft_link_product_image_gallery(); ?>

                <?php if($linkImageGallery): ?>
                    <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
                <?php endif; ?>

                <?php foreach ($imageGallery as $image): ?>
                    <div class="slick-slide">
                        <figure class="center">
                            <?php echo wp_get_attachment_image($image, array(250, 250)); ?>
                        </figure>
                    </div>
                <?php endforeach; ?>

                <?php if($linkImageGallery): ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="slick-product-nav">
                <?php foreach ($imageGallery as $image): ?>
                    <div class="slick-slide">
                        <figure class="center">
                            <?php echo wp_get_attachment_image($image, array(50, 50)); ?>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="product-thumbnail">
        <?php if(has_post_thumbnail()): ?>
            <?php $linkImageGallery = afft_link_product_image_gallery(); ?>

            <?php if($linkImageGallery): ?>
                <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
            <?php endif; ?>

            <?php the_post_thumbnail(); ?>

            <?php if($linkImageGallery): ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <?php get_template_part('partials/misc/no-thumbnail'); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
