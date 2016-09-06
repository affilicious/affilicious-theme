<table class="product-details table table-striped">
    <tbody>
        <?php $affiliateLink = affilicious_get_product_cheapest_affiliate_link($product); ?>
        <?php $price = affilicious_get_product_cheapest_price($product); ?>
        <?php if(!empty($price)): ?>
            <tr>
                <td><?php _e('Price', 'affilicious-theme'); ?></td>
                <td>
                    <?php if(!empty($affiliateLink)): ?>
                    <a class="price" href="<?php echo $affiliateLink; ?>" itemprop="price">
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

        <?php $fields = affilicious_get_product_details(); ?>
        <?php if(!empty($fields)): ?>
            <?php foreach ($fields as $field): ?>
                <tr>
                    <td><?php echo $field['name']; ?></td>
                    <?php if($field['type'] === 'file'): ?>
                        <td><?php echo wp_get_attachment_link($field['value'], 'medium', false, false, __('Download', 'affiliate-theme')); ?></td>
                    <?php else: ?>
                        <td><?php echo esc_html($field['value']); ?> <?php echo esc_html($field['unit']); ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
