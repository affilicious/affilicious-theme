<?php $affiliateLink = affilicious_get_product_affiliate_link($product); ?>

<?php if($imageGallery = affilicious_get_product_image_gallery($product)): ?>
    <div class="product-image-gallery">
        <div class="portfolio-slider">
            <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
                <div class="slick-slider">
                    <?php foreach ($imageGallery as $image): ?>
                        <div class="slick-slider-item" itemprop="image">
                            <?php echo wp_get_attachment_image($image, array(250, 250)); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </a>
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
    </div>
<?php else: ?>
    <div class="product-thumbnail">
        <?php if(has_post_thumbnail()): ?>
            <a href="<?php echo $affiliateLink; ?>" rel="nofollow" target="_blank">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php else: ?>
            <i class="fa fa-question-circle-o fa-2x"></i>
        <?php endif; ?>
    </div>
<?php endif; ?>
