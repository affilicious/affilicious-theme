<?php $product = affilicious_get_product(); ?>
<?php $affiliateLink = affilicious_get_product_affiliate_link($product); ?>

<?php if($imageGallery = affilicious_get_product_image_gallery($product)): ?>
    <div class="product-image-gallery">
        <div class="portfolio-slider">
            <?php $linkImageGallery = affilicious_theme_link_product_image_gallery(); ?>

            <?php if($linkImageGallery): ?>
                <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
            <?php endif; ?>

            <div class="slick-slider">
                <?php foreach ($imageGallery as $image): ?>
                    <div class="slick-slider-item" itemprop="image">
                        <?php echo wp_get_attachment_image($image['id'], array(250, 250)); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if($linkImageGallery): ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="thumb-slider">
            <div class="slick-slider">
                <?php foreach ($imageGallery as $image): ?>
                    <div class="slick-slider-item">
                        <?php echo wp_get_attachment_image($image['id'], array(50, 50)); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="product-thumbnail">
        <?php if(has_post_thumbnail()): ?>
            <?php $linkImageGallery = affilicious_theme_link_product_image_gallery(); ?>

            <?php if($linkImageGallery): ?>
                <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
            <?php endif; ?>

            <?php the_post_thumbnail(); ?>

            <?php if($linkImageGallery): ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <i class="fa fa-question-circle-o fa-2x"></i>
        <?php endif; ?>
    </div>
<?php endif; ?>
