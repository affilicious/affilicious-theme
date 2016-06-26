<?php

// Default Style Support
add_action('wp_enqueue_scripts', 'ap_add_theme_style');
function ap_add_theme_style() {
    wp_enqueue_style('theme-style-css', get_template_directory_uri() . '/css/style.css', array('font-awesome-css', 'bootstrap-css'));
}

// Default Script Support
add_action('wp_enqueue_scripts', 'ap_add_theme_script');
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
