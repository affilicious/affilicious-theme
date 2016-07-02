<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


function ap_has_main_navigation()
{
    return has_nav_menu('top-menu');
}

function ap_main_navigation()
{
    wp_nav_menu(array(
        'menu_id'           => 'nav-top-menu',
        'theme_location'    => 'top-menu',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'top-menu',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
    ));
}

function ap_has_bottom_navigation()
{
    return has_nav_menu('bottom-menu');
}

function ap_bottom_navigation()
{
    wp_nav_menu(array(
        'menu'              => 'footer_links',
        'theme_location'    => 'bottom-menu',
        'depth'             => 2,
        'container'         => 'nav',
        'container_class'   => 'navbar-collapse',
        'container_id'      => 'bottom-menu',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
    ));
}


// Register Top Menu
add_action('after_setup_theme', 'ap_register_menu');
function ap_register_menu() {
    register_nav_menu('top-menu', 'Obere Navigation');
    register_nav_menu('bottom-menu', 'Untere Navigation');
}

