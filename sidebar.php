<div class="sidebars">
    <?php if(aff_is_product() && afft_is_active_product_sidebar()): ?>
        <div class="sidebar sidebar-product">
            <ul>
                <?php afft_get_product_sidebar(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(is_active_sidebar('main-sidebar')): ?>
        <aside class="sidebar sidebar-main" role="complementary"
               itemscope itemtype="http://schema.org/WPSideBar">
            <ul>
                <?php dynamic_sidebar('main-sidebar'); ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>
