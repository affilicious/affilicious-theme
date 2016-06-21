<?php

// Font Awesome support
function theme_add_font_awesome() {
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'theme_add_font_awesome');

// Bootstrap support
function theme_add_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true);
}

add_action('wp_enqueue_scripts', 'theme_add_bootstrap');
