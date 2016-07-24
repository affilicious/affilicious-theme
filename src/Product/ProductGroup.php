<?php
namespace ProjektAffiliateTheme\Product;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ProductGroup
{
    const POST_TYPE = 'product_group';
    const CATEGORY = 'at_product_group_category';
    const FIELDS = 'at_product_group_fields';

    /**
     * Holds als important data related to the group.
     * The product groups are just custom post types
     * @var \WP_Post
     */
    private $post;

    /**
     * @param int|\WP_Post $post
     * @throws \Exception
     */
    public function __construct($post = null)
    {
        if($post instanceof \WP_Post) {
            $this->post = $post;
        } elseif (is_int($post)) {
            $this->post = get_post($post);
        } elseif (is_string($post)) {
            $this->post = get_post($post);
        } else {
            $this->post = get_post();
        }

        if ($this->post === null) {
            throw new \Exception( __('Failed to find the product group'));
        }
    }

    /**
     * Get the unique ID
     * @return int
     */
    public function getId()
    {
        return $this->post->ID;
    }

    /**
     * Get the title
     * @return string
     */
    public function getTitle()
    {
        return $this->post->post_title;
    }

    /**
     * Get the fields
     * @return ProductField[]
     */
    public function getFields()
    {
        $rawFields = carbon_get_post_meta(get_the_ID(), self::FIELDS, 'complex');

        $fields = array();
        foreach ($rawFields as $rawField) {
            $field = ProductField::fromRaw($rawField);
            $fields[] = $field;
        }

        return $fields;
    }

    /**
     * Get the category slug
     * @return string
     */
    public function getCategory()
    {
        return carbon_get_post_meta($this->getId(), self::CATEGORY);
    }

    /**
     * Returns the raw underlying Wordpress post
     * @return \WP_Post
     */
    public function getRawPost()
    {
        return $this->post;
    }
}
