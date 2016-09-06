<?php if($imageGallery = affilicious_get_product_image_gallery($product)): ?>
    <?php $affiliateLink = affilicious_get_product_affiliate_link($product); ?>

    <div class="product-image-gallery">
        <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
            <div class="portfolio-slider">
                <div class="slick-slider">
                    <?php foreach ($imageGallery as $image): ?>
                        <div class="slick-slider-item" itemprop="image">
                            <?php echo wp_get_attachment_image($image, array(250, 250)); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="thumb-slider">
                <div class="slick-slider">
                    <?php foreach ($imageGallery as $image): ?>
                        <div class="slick-slider-item">
                            <?php echo wp_get_attachment_image($image, array(50, 50)); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </a>
    </div>
<?php else: ?>
    <?php $affiliateLink = affilicious_get_product_affiliate_link($product); ?>

    <div class="product-thumbnail">
        <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
            <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
            <?php else: ?>
                <i class="fa fa-question-circle-o fa-2x"></i>
            <?php endif; ?>
        </a>
    </div>
<?php endif; ?>
