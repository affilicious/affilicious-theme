<?php
namespace ProjektAffiliateTheme\Product;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ProductGroupSetup
{
    public function __construct()
    {
        add_action('init', array($this, 'init'), 2);
        add_action('init', array($this, 'addMetaBoxes'), 3);
        add_action('init', array($this, 'addDetailBoxes'), 4);
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

        register_post_type(ProductGroup::POST_TYPE, array(
            'labels' => $labels,
            'public' => false,
            'menu_icon' => 'dashicons-feedback',
            'show_ui' => true,
            '_builtin' => false,
            'menu_position' => 6,
            'capability_type' => 'page',
            'hierarchical' => true,
            'rewrite' => false,
            'query_var' => ProductGroup::POST_TYPE,
            'supports' => array('title',),
            'show_in_menu' => true,
        ));
    }

    public function addMetaBoxes()
    {
        $categories = ProductCategory::all();

        $options = array();
        foreach ($categories as $category) {
            $options[$category->getSlug()] = $category->getName();
        }

        Container::make('post_meta', __('Edit category', 'projektaffiliatetheme'))
            ->show_on_post_type(ProductGroup::POST_TYPE)
            ->add_fields(array(
                Field::make("select", ProductGroup::CATEGORY, __("Category", 'projektaffiliatetheme'))
                    ->add_options($options),
            ));

        Container::make('post_meta', __('Edit fields', 'projektaffiliatetheme'))
            ->show_on_post_type(ProductGroup::POST_TYPE)
            ->add_fields(array(
                Field::make('complex', ProductGroup::FIELDS, __('Fields', 'projektaffiliatetheme'))
                    ->add_fields(array(
                            Field::make('text', ProductField::ID, __("Field ID", 'projektaffiliatetheme'))
                                ->set_required(true)
                                ->help_text(__('Create a unique id with non-special characters, numbers and _ only', 'projektaffiliatetheme')),
                            Field::make('text', ProductField::NAME, __("Field name", 'projektaffiliatetheme'))
                                ->set_required(true),
                            Field::make("select", ProductField::TYPE, __("Field type", 'projektaffiliatetheme'))
                                ->set_required(true)
                                ->add_options(array(
                                    'text' => __('Text', 'projektaffiliatetheme'),
                                    'textarea' => __('Textarea', 'projektaffiliatetheme'),
                                    'number' => __('Number', 'projektaffiliatetheme'),
                                    'file' => __('File', 'projektaffiliatetheme'),
                                )),
                            Field::make('text', ProductField::DEFAULT_VALUE, __("Field default value", 'projektaffiliatetheme')),
                            Field::make('text', ProductField::HELP_TEXT, __("Field help text", 'projektaffiliatetheme'))
                        )
                    )
            ));
    }

    public function addDetailBoxes()
    {
        $query = new \WP_Query(array(
            'post_type' => ProductGroup::POST_TYPE,
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        if($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $productGroup = new ProductGroup(get_the_ID());
                $fields = $productGroup->getFields();

                $details = array();
                if(!empty($fields)) {

                    /*
                    $details[] = Field::make("checkbox", "at_product_group_show_" . $productGroup->getId(), __('Show details in the product', 'projektaffiliatetheme'))
                        ->set_option_value('yes');
                    */

                    foreach ($fields as $field) {
                        $detail = Field::make($field->getType(), $field->getId(), $field->getName());

                        if ($field->hasDefaultValue()) {
                            $detail->default_value($field->getDefaultValue());
                        }

                        if ($field->getHelpText()) {
                            $detail->help_text($field->getHelpText());
                        }

                        $details[] = $detail;
                    }

                }

                Container::make('post_meta', $productGroup->getTitle())
                    ->show_on_post_type('product')
                    ->show_on_taxonomy_term($productGroup->getCategory(), ProductCategory::TAXONOMY)
                    ->set_priority('default')
                    ->add_fields($details);
            }
        }
    }
}
