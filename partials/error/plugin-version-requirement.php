<br><br><br>
<?php
if(is_user_logged_in()) {
    echo sprintf(
        __('The required Affilicious Plugin version %s is not installed. Please open your <a href="%s">admin area</a> and update the missing plugin.', 'affilicious-theme'),
        afft_get_min_plugin_version(),
        admin_url('themes.php?page=tgmpa-install-plugins')
    );
}
?>
