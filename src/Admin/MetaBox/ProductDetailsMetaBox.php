<?php
namespace ProjektAffiliateTheme\Admin\MetaBox;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ProductDetailsMetaBox implements MetaBoxInterface
{
    /**
     * The stored meta key in the database
     */
    const META_KEY = 'product_details';

    /**
     * @inheritdoc
     */
    public static function render(\WP_Post $post, $args)
    {

    }

    /**
     * @inheritdoc
     */
    public static function update($post_id, \WP_Post $post)
    {

    }
}
