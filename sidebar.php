<?php if(affilicious_is_product() && affilicious_is_active_product_sidebar()): ?>
    <div class="sidebar sidebar-product">
        <ul>
            <?php affilicious_get_product_sidebar(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(is_active_sidebar('main-sidebar')): ?>
    <aside class="sidebar sidebar-main">
        <ul>
            <?php dynamic_sidebar('main-sidebar'); ?>
        </ul>
    </aside>
<?php endif; ?>
