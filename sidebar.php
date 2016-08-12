<?php if(is_singular('product') && is_active_sidebar('product-sidebar')): ?>
    <div class="sidebar sidebar-product">
        <ul>
            <?php dynamic_sidebar('product-sidebar'); ?>
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
