<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function ap_register_sidebar() {
    register_sidebar(array(
        'name' => 'Haupt Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Die Hauptsidebar ist auf jeder Seite sichtbar',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
        'before_widget' => '<li class="widget">',
        'after_widget' => '</li>',
    ));
}
add_action('widgets_init', 'ap_register_sidebar');

