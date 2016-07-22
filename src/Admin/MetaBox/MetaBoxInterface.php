<?php
namespace ProjektAffiliateTheme\Admin\MetaBox;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

interface MetaBoxInterface
{
    /**
     * Render the html output of the meta box
     * @param \WP_Post $post
     * @param array $args
     */
    public static function render(\WP_Post $post, $args);

    /**
     * Update the meta box data
     * @param int $post_id
     * @param \WP_Post $post
     */
    public static function update($post_id, \WP_Post $post);
}
