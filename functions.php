<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/affilicious-theme.php');

/**
 * Run the Affilicious Theme
 *
 * @since 0.2
 */
function affilicious_theme_run()
{
    $affiliciousTheme =  new AffiliciousTheme();
    $affiliciousTheme->run();
}

affilicious_theme_run();
