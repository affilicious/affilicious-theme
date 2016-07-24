<?php
namespace ProjektAffiliateTheme\Product;

class ProductGroup
{
    public function __construct()
    {
        add_action('init', array($this, 'init'), 1);
    }

    public function init()
    {
        $labels = array(
            'name' => _x('Product groups', 'projektaffiliatetheme'),
            'singular_name' => _x('Product group', 'projektaffiliatetheme'),
            'menu_name' => __('Product groups', 'projektaffiliatetheme'),
            'name_admin_bar' => __('Product group', 'projektaffiliatetheme'),
            'archives' => __('Product group archives', 'projektaffiliatetheme'),
            'parent_item_colon' => __('Parent product group:', 'projektaffiliatetheme'),
            'all_items' => __('All product groups', 'projektaffiliatetheme'),
            'add_new_item' => __('Add new Product group', 'projektaffiliatetheme'),
            'add_new' => __('Add new', 'projektaffiliatetheme'),
            'new_item' => __('New product group', 'projektaffiliatetheme'),
            'edit_item' => __('Edit product group', 'projektaffiliatetheme'),
            'update_item' => __('Update product group', 'projektaffiliatetheme'),
            'view_item' => __('View product group', 'projektaffiliatetheme'),
            'search_items' => __('Search product group', 'projektaffiliatetheme'),
            'not_found' => __('Not found', 'projektaffiliatetheme'),
            'not_found_in_trash' => __('Not found in Trash', 'projektaffiliatetheme'),
            'featured_image' => __('Featured Image', 'projektaffiliatetheme'),
            'set_featured_image' => __('Set featured image', 'projektaffiliatetheme'),
            'remove_featured_image' => __('Remove featured image', 'projektaffiliatetheme'),
            'use_featured_image' => __('Use as featured image', 'projektaffiliatetheme'),
            'insert_into_item' => __('Insert into item', 'projektaffiliatetheme'),
            'uploaded_to_this_item' => __('Uploaded to this product group', 'projektaffiliatetheme'),
            'items_list' => __('Product groups list', 'projektaffiliatetheme'),
            'items_list_navigation' => __('Product groups list navigation', 'projektaffiliatetheme'),
            'filter_items_list' => __('Filter items list', 'projektaffiliatetheme'),
        );

        register_post_type('product_group', array(
            'labels' => $labels,
            'public' => false,
            'menu_icon' => 'dashicons-feedback',
            'show_ui' => true,
            '_builtin' =>  false,
            'menu_position' => 6,
            'capability_type' => 'page',
            'hierarchical' => true,
            'rewrite' => false,
            'query_var' => "product_group",
            'supports' => array(
                'title',
            ),
            'show_in_menu'	=> true,
        ));
    }
}
