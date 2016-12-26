<?php if (has_post_thumbnail()): ?>
<?php if(afft_is_post_type('product')): ?>
    <?php $affiliateLink = aff_get_product_affiliate_link(); ?>
    <?php $linkImageGallery = afft_link_product_preview_image(); ?>
<?php endif; ?>

<div class="product-preview-thumbnail" itemprop="image">
    <a href="<?php echo !empty($linkImageGallery) && !empty($affiliateLink) ? $affiliateLink : esc_url(get_permalink()) ; ?>" rel="nofollow" target="_blank">
        <?php the_post_thumbnail(); ?>
    </a>

    <div class="product-preview-badge-bar">
        <span class="product-preview-badge-item label label-success">300.00 €</span>
        <span class="product-preview-badge-item label label-info">Testsieger</span>
    </div>
</div>

<?php endif; ?>

<small class="product-preview-price-indication text-muted">
    <?php aff_the_shop_price_indication(); ?>
</small>
