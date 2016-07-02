<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', 'ap_add_post_thumbnails');
function ap_add_post_thumbnails() {
    add_theme_support('post-thumbnails');
}

// Title Tag Support
add_action('after_setup_theme', 'ap_add_title_tag');
function ap_add_title_tag() {
    add_theme_support('title-tag');
}


