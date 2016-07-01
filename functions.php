<?php
define('PROJEKT_AFFILIATE_THEME_LIBRARY', TEMPLATEPATH . '/lib');
define('PROJEKT_AFFILIATE_THEME_IMAGES', TEMPLATEPATH . '/img');

require_once(PROJEKT_AFFILIATE_THEME_LIBRARY . '/customizer/general_customizer.php');
require_once(PROJEKT_AFFILIATE_THEME_LIBRARY . '/customizer/header_customizer.php');
require_once(PROJEKT_AFFILIATE_THEME_LIBRARY . '/product/register.php');
require_once(PROJEKT_AFFILIATE_THEME_LIBRARY . '/product/metabox.php');

// Layout
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

// Logo
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

// Navigation
function ap_has_main_navigation() {
    return has_nav_menu('top-menu');
}

function ap_main_navigation() {
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





require_once('wp_bootstrap_navwalker.php');

// Default Style Support
add_action('admin_enqueue_scripts', 'ap_add_admin_style');
function ap_add_admin_style() {
    wp_enqueue_style('admin-style-css', get_template_directory_uri() . '/css/admin.css', array());
}

// Default Style Support
add_action('wp_enqueue_scripts', 'ap_add_theme_style');
function ap_add_theme_style() {
    wp_enqueue_style('theme-style-css', get_template_directory_uri() . '/css/style.css', array('font-awesome-css', 'bootstrap-css'));
}

// Retina Support
add_action('wp_enqueue_scripts', 'ap_add_retina');
function ap_add_retina() {
    wp_enqueue_script('retina-script-js', get_template_directory_uri() . '/js/retina.min.js');
}

// Default Script Support
add_action('admin_enqueue_scripts', 'ap_add_theme_script');
function ap_add_theme_script() {
    wp_enqueue_script('theme-script-js', get_template_directory_uri() . '/js/script.js', array('jquery'));
}

// Font Awesome Support
add_action('wp_enqueue_scripts', 'ap_add_font_awesome');
function ap_add_font_awesome() {
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
}

// Bootstrap Support
add_action('wp_enqueue_scripts', 'ap_add_bootstrap');
function ap_add_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true);
}

// Post Thumbnails Support
add_action('after_setup_theme', 'ap_add_post_thumbnails');
function ap_add_post_thumbnails() {
    add_theme_support('post-thumbnails');
}

// Title Tag Support
add_action('after_setup_theme', 'ap_add_title_tag');
function ap_add_title_tag() {
    add_theme_support('title-tag');
}

// Register Top Menu
add_action('after_setup_theme', 'ap_register_menu');
function ap_register_menu() {
    register_nav_menu('top-menu', 'Obere Navigation');
    register_nav_menu('bottom-menu', 'Untere Navigation');
}

// Add Sidebar
function ap_register_sidebar() {
    register_sidebar(array(
        'name' => 'Haupt Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Die Hauptsidebar ist auf jeder Seite sichtbar',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
    ));
}
add_action('widgets_init', 'ap_register_sidebar');
