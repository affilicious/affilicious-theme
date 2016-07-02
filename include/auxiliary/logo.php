<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function ap_has_logo() {
    $logo = get_theme_mod('ap_general_logo');
    return $logo != null;
}

function ap_get_logo() {
    return get_theme_mod('ap_general_logo');
}

function ap_logo() {
    echo ap_get_logo();
}

function ap_has_logo_retina() {
    $logo = get_theme_mod('ap_general_logo_retina');
    return $logo != null;
}

function ap_get_logo_retina() {
    return get_theme_mod('ap_general_logo_retina');
}

function ap_logo_retina() {
    echo ap_get_logo_retina();
}
