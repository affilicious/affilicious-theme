<?php

add_action('init', 'test');
function test() {
    register_post_type('product', array(
        'label' => __('Product', 'projektaffiliatetheme'),
        'exclude_from_search' => false,
        'show_in_menu' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_icon' => 'dashicons-products',
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions'
        ),
        'taxonomies' => array(
            'category', 'post_tag'
        ),
        'can_export' => true,
    ));
}
