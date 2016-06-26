<div class="col-md-4 col-xs-12">
    <?php if(is_active_sidebar('sidebar-1')): ?>
        <aside class="sidebar">
            <ul>
                <?php dynamic_sidebar('sidebar-1'); ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>
