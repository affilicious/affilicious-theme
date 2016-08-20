<?php do_action('affilicious_theme_product_above_post'); ?>

<?php $product = affilicious_get_product(); ?>
<article id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
    <header class="product-header box">
        <h1 class="product-title"><?php the_title(); ?></h1>

        <div class="row">
            <div class="col-md-5">
                <?php if($imageGallery = affilicious_get_product_image_gallery($product)): ?>
                    <div class="product-image-gallery">
                        <div class="portfolio-slider">
                            <div class="slick-slider">
                                <?php foreach ($product->getImageGallery() as $image): ?>
                                    <div class="slick-slider-item">
                                        <?php echo wp_get_attachment_image($image, array(250, 250)); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="thumb-slider">
                            <div class="slick-slider">
                                <?php foreach ($product->getImageGallery() as $image): ?>
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
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <i class="fa fa-question-circle-o fa-2x"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-7">
                <?php $fields = affilicious_get_product_details(); ?>
                <?php if(!empty($fields)): ?>
                    <table class="product-table table table-striped">
                        <tbody>
                        <?php foreach ($fields as $field): ?>
                            <tr>
                                <td><?php echo $field['name']; ?></td>
                                <?php if($field['type'] === 'file'): ?>
                                    <td><?php echo wp_get_attachment_link($field['value']); ?></td>
                                <?php else: ?>
                                    <td><?php echo esc_html($field['value']); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="product-body box">
        <?php the_content(); ?>
    </div>

    <footer class="product-footer"></footer>
</article>

<?php do_action('affilicious_theme_product_below_post'); ?>
