<?php

// Default Style Support
function ap_add_theme_style() {
    wp_enqueue_style('theme-style-css', get_template_directory_uri() . '/css/style.css', array(
        'font-awesome-css',
        'bootstrap-css'
    ));
}

add_action('wp_enqueue_scripts', 'ap_add_theme_style');

// Font Awesome Support
function ap_add_font_awesome() {
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'ap_add_font_awesome');

// Bootstrap Support
function ap_add_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true);
}

add_action('wp_enqueue_scripts', 'ap_add_bootstrap');
