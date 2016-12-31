<div class="row">
    <?php if(aff_is_product_page() && aff_has_product_shops()): ?>
        <div class="col-xs-12">
            <div id="product-sidebar">
                <?php get_template_part('partials/product-sidebar'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(is_active_sidebar('afft-main-sidebar')): ?>
        <div class="col-xs-12">
            <aside id="main-sidebar"
                   role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                <div class="row">
                    <?php dynamic_sidebar('afft-main-sidebar'); ?>
                </div>
            </aside>
        </div>
    <?php endif; ?>
</div>
