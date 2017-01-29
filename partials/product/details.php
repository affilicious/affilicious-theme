<table class="product-details table table-striped">
    <tbody>
        <?php $product = aff_get_product(); ?>
        <?php $affiliateLink = aff_get_product_cheapest_affiliate_link($product); ?>
        <?php $details = aff_get_product_details(); ?>
        <?php if(!empty($details)): ?>
            <?php foreach ($details as $detail): ?>
                <tr data-detail-name="<?php echo $detail['slug']; ?>">
                    <td><?php echo $detail['name']; ?></td>
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
