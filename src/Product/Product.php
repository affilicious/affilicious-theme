<?php
namespace ProjektAffiliateTheme\Product;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Product
{
    const POST_TYPE = 'product';

    /**
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
            throw new \Exception(__('Failed to find the product.'));
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->post->ID;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->post->post_title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->post->post_content;
    }

    /**
     * @return string
     */
    public function getExcerpt()
    {
        return $this->post->post_excerpt;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->post->post_author;
    }

    /**
     * @return false|string
     */
    public function getPermalink()
    {
        return get_permalink($this->post);
    }

    /**
     * @return bool
     */
    public function hasThumbnail()
    {
        return has_post_thumbnail($this->post);
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return get_the_post_thumbnail($this->post);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->post->post_date;
    }

    /**
     * @return string
     */
    public function getModifiedAt()
    {
        return $this->post->post_modified;
    }

    public function getDetails()
    {
        $categories = ProductCategory::forProduct($this);
        $query = new \WP_Query(array(
            'post_type' => ProductGroup::POST_TYPE,
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        $detailGroups = array();
        if($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $productGroup = new ProductGroup(get_the_ID());

                if(true) {
                    $fields = $productGroup->getFields();
                    $detailGroups[$productGroup->getId()] = array();

                    foreach ($fields as $field) {
                        $detailGroup = array();
                        $detailGroup['group'] = $field->getGroup();
                        $detailGroup['key'] = $field->getKey();
                        $detailGroup['name'] = $field->getName();

                        $value = carbon_get_post_meta($this->getId(), sprintf(
                            ProductField::ID, $field->getGroup(), $field->getKey()
                        ));

                        $detailGroup['value'] = !empty($value) ? $value : null;

                        $detailGroups[$productGroup->getId()][] = $detailGroup;
                    }
                }


            }
        }

        return $detailGroups;
    }
}
