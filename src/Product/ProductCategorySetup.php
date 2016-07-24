<?php
namespace ProjektAffiliateTheme\Product;

class ProductCategorySetup
{
    public function __construct()
    {
        add_action('init', array($this, 'init'), 1);
    }

    public function init()
    {
        $labels = array(
            'name' => __('Categories', 'projektaffiliatetheme'),
            'singular_name' => __('Category', 'projektaffiliatetheme'),
            'search_items' => __('Search categories', 'projektaffiliatetheme'),
            'all_items' => __('All categories', 'projektaffiliatetheme'),
            'parent_item' => __('Parent category', 'projektaffiliatetheme'),
            'parent_item_colon' => __('Parent category:', 'projektaffiliatetheme'),
            'edit_item' => __('Edit category', 'projektaffiliatetheme'),
            'update_item' => __('Update category', 'projektaffiliatetheme'),
            'add_new_item' => __('Add New category', 'projektaffiliatetheme'),
            'new_item_name' => __('New category name', 'projektaffiliatetheme'),
            'menu_name' => __('Categories', 'projektaffiliatetheme'),
        );

        register_taxonomy(ProductCategory::TAXONOMY, Product::POST_TYPE, array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'category'),
            'public' => true,
        ));

    }
}
