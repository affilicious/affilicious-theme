<table class="product-details table table-striped">
    <tbody>
        <?php $product = aff_get_product(); ?>
        <?php $affiliateLink = aff_get_product_cheapest_affiliate_link($product); ?>
        <?php $price = aff_get_product_cheapest_price($product); ?>
        <?php if(!empty($price)): ?>
            <tr>
                <td><?php _e('Price', 'affilicious-theme'); ?></td>
                <td>
                    <?php if(!empty($affiliateLink)): ?>
                    <a class="price" href="<?php echo $affiliateLink; ?>" itemprop="price" rel="nofollow" target="_blank">
                        <?php echo $price; ?>
                    </a>
                    <?php else: ?>
                    <span class="price" itemprop="price">
                        <?php echo $price; ?>
                    </span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>

        <?php $details = aff_get_product_details(); ?>
        <?php if(!empty($details)): ?>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td><?php echo $detail['title']; ?></td>
                    <?php if($detail['type'] === 'file'): ?>
                        <td><?php echo wp_get_attachment_link($detail['value'], 'medium', false, false, __('Download', 'affiliate-theme')); ?></td>
                    <?php else: ?>
                        <td><?php echo esc_html($detail['value']); ?> <?php echo esc_html($detail['unit']); ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
