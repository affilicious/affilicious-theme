<?php
namespace ProjektAffiliateTheme\Product;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ProductCategory
{
    const TAXONOMY = 'product_category';
    const SLUG = 'produktkategorie';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * Find all product categories
     * @return ProductCategory[]
     * @throws \Exception
     */
    public static function all()
    {
        if (is_version('4.5')) {
            $terms = get_terms(array(
                'taxonomy' => self::TAXONOMY,
                'orderby' => 'name',
                'hide_empty' => false,
                'parent' => 0,
            ));
        } else {
            $terms = get_terms(self::TAXONOMY, array(
                'orderby' => 'name',
                'hide_empty' => false,
                'parent'  => 0,
            ));
        }

        if ($terms instanceof \WP_Error) {
            throw new \Exception('Failed to find the terms for the taxonomy ' . self::TAXONOMY . '.');
        }

        $categories = array();
        foreach ($terms as $term) {
            $categories[] = new self($term->ID, $term->name, $term->slug);
        }

        return $categories;
    }

    /**
     * @param Product $product
     * @return ProductCategory[]
     * @throws \Exception
     */
    public static function forProduct(Product $product)
    {
        $terms = wp_get_post_terms($product->getId(), self::TAXONOMY, array(
            'orderby' => 'name',
            'hide_empty' => false,
            'parent'  => 0,
        ));

        $categories = array();
        foreach ($terms as $term) {
            $categories[] = new self($term->ID, $term->name, $term->slug);
        }

        return $categories;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $slug
     */
    public function __construct($id, $name, $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
