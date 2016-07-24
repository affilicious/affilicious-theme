<?php
namespace ProjektAffiliateTheme\Admin\MetaBox;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

final class MetaBoxManager
{
    /**
     * @var bool
     */
    private $updated_meta_boxes;

    /**
     * Construct this object and hook into the required Wordpress actions
     */
    public function __construct()
    {
        $this->updated_meta_boxes = false;

        add_action('add_meta_boxes', array($this, 'add_meta_boxes'), 10);
        add_action('save_post', array($this, 'update_meta_boxes'), 1, 2);

        add_action('ap_process_product_meta', __NAMESPACE__ . '\ProductImageGalleryMetaBox::update', 10, 2);
    }

    /**
     * Add all available theme meta boxes
     */
    public function add_meta_boxes()
    {
        add_meta_box('ap_product_image_gallery', __('Product image gallery', 'projektaffiliatetheme'), __NAMESPACE__ . '\ProductImageGalleryMetaBox::render', 'product', 'side', 'low');
        add_meta_box('ap_product_details', __('Product details', 'projektaffiliatetheme'),  __NAMESPACE__ . '\ProductDetailsMetaBox::render', 'product', 'normal', 'high');
    }

    /**
     * Update all available theme meta boxes
     * @param int $post_id
     * @param \WP_Post $post
     */
    public function update_meta_boxes($post_id, \WP_Post $post)
    {
        // Check if the call is valid
        if ((empty($post_id) || empty($post) && (empty($_POST['post_ID']) || $_POST['post_ID'] != $post_id))) {
            return;
        }

        // Skip updates for already updated meta boxes
        if ($this->updated_meta_boxes) {
            return;
        }

        // Skip updates for revisions or autosaves
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check if the user has permission to edit the meta boxes
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        do_action('ap_process_' . $post->post_type . '_meta', $post_id, $post);

        $this->updated_meta_boxes = true;
    }
}

new MetaBoxManager();
