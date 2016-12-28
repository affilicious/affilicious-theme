<div class="no-thumbnail-container">
    <i class="no-thumbnail-icon fa fa-question-circle-o"></i>

    <p class="no-thumbnail-text">
        <?php _e('No image available', 'affilicious-theme'); ?>
    </p>

    <?php if(current_user_can('edit_post')): ?>
        <a class="no-thumbnail-add-image" href="<?php echo admin_url('upload.php')?>">
            <?php _e('Add now', 'affilicious-theme'); ?>
        </a>
    <?php endif; ?>
</div>
