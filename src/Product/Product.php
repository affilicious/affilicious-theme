<?php
namespace ProjektAffiliateTheme\Product;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Product
{
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
        } else {
            $this->post = get_post();
        }

        if ($this->post === null) {
            throw new \Exception(sprintf(
                __('Failed to find the product with the id %d.'), $id
            ));
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
}
