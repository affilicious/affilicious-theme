<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Default Style Support
add_action('admin_enqueue_scripts', 'ap_add_admin_style');
function ap_add_admin_style() {
    wp_enqueue_style('admin-style-css', get_template_directory_uri() . '/assets/css/admin.css', array());
}

// Default Style Support
add_action('wp_enqueue_scripts', 'ap_add_theme_style');
function ap_add_theme_style() {
    wp_enqueue_style('theme-style-css', get_template_directory_uri() . '/assets/css/style.css', array('font-awesome-css', 'bootstrap-css'));
}

// Retina Support
add_action('wp_enqueue_scripts', 'ap_add_retina');
function ap_add_retina() {
    wp_enqueue_script('retina-script-js', get_template_directory_uri() . '/assets/js/retina.min.js');
}

// Default Script Support
add_action('admin_enqueue_scripts', 'ap_add_theme_script');
function ap_add_theme_script() {
    wp_enqueue_script('theme-script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'));
}

// Font Awesome Support
add_action('wp_enqueue_scripts', 'ap_add_font_awesome');
function ap_add_font_awesome() {
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
}

// Bootstrap Support
add_action('wp_enqueue_scripts', 'ap_add_bootstrap');
function ap_add_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.0.0', true);
}
