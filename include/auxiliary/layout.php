<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function ap_is_loose_layout() {
    $layout = get_theme_mod('ap_general_layout');
    return $layout === 'loose' || $layout === false;
}

function ap_is_tight_layout() {
    $layout = get_theme_mod('ap_general_layout');
    return $layout === 'tight';
}

add_filter('body_class', 'ap_layout_body_class');
function ap_layout_body_class($classes) {
    if (ap_is_loose_layout()) {
        $classes[] = 'loose';
    } elseif (ap_is_tight_layout()) {
        $classes[] = 'tight';
    }

    return $classes;
}
