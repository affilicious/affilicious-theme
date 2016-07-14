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




add_filter('widget_tag_cloud_args', 'ap_widget_tag_cloud_args');
function ap_widget_tag_cloud_args($args)
{
    $args['largest'] = 160;
    $args['smallest'] = 80;
    $args['unit'] = '%';
    return $args;
}
