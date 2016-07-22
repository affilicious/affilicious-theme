<div class="col-md-4 col-xs-12">
    <?php if(is_active_sidebar('main-sidebar')): ?>
        <aside class="sidebar">
            <ul>
                <?php dynamic_sidebar('main-sidebar'); ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>
