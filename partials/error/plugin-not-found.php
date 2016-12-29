<br><br><br>
<?php
if(is_user_logged_in()) {
    echo sprintf(
        __('Failed to find the required Affilicious Plugin. Please open your <a href="%s">admin area</a> and install the missing plugin.', 'affilicious-theme'),
        admin_url('themes.php?page=tgmpa-install-plugins')
    );
}
?>
