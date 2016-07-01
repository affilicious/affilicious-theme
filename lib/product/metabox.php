<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

interface AP_Meta_Box_Interface
{
    /**
     * Render the html output of the meta box
     * @param WP_Post $post
     * @param array $args
     */
    public static function render(WP_Post $post, $args);

    /**
     * Update the meta box data
     * @param int $post_id
     * @param WP_Post $post
     */
    public static function update($post_id, WP_Post $post);
}

class AP_Product_Image_Gallery_Meta_Box implements AP_Meta_Box_Interface
{
    /**
     * The stored meta key in the database
     */
    const META_KEY = 'product_image_gallery';

    /**
     * @inheritdoc
     */
    public static function render(WP_Post $post, $args)
    {
        $product_image_gallery = get_post_meta($post->ID, '_' . self::META_KEY, true);
        $attachment_ids = array_filter(explode(',', $product_image_gallery));

        ?>
        <div id="product_images_container">
            <ul class="product_images">
                <?php
                    if (!empty($attachment_ids)) {
                        $update_meta = false;
                        $updated_attachment_ids = array();

                        foreach ($attachment_ids as $attachment_id) {
                            $attachment = wp_get_attachment_image($attachment_id, 'thumbnail');

                            if (empty($attachment)) {
                                $update_meta = true;
                                continue;
                            }

                            ?>
                                <li class="image" data-attachment_id="<?php echo esc_attr($attachment_id); ?>">
								    <?php echo $attachment; ?>
                                    <ul class="actions">
									    <li><a href="#" class="delete tips"
									           data-tip="<?php esc_attr__('Delete image', 'projektaffiliatetheme'); ?>">
									           <?php __('Delete', 'projektaffiliatetheme'); ?>
                                            </a>
                                        </li>
								    </ul>
							    </li>
                            <?php

                            $updated_attachment_ids[] = $attachment_id;
                        }

                        // Update new image gallery IDs
                        if ($update_meta) {
                            update_post_meta( $post->ID, '_' . self::META_KEY, implode(',', $updated_attachment_ids));
                        }
                    }
                ?>
            </ul>
            <input type="hidden" id="<?php echo self::META_KEY; ?>"
                   name="<?php echo self::META_KEY; ?>"
                   value="<?php echo esc_attr($product_image_gallery); ?>" />
        </div>
        <p class="add_product_images hide-if-no-js">
            <a href="#"
               data-choose="<?php esc_attr_e('Add images to product image gallery', 'projektaffiliatetheme'); ?>"
               data-update="<?php esc_attr_e('Add image', 'projektaffiliatetheme'); ?>"
               data-delete="<?php esc_attr_e('Delete image', 'projektaffiliatetheme'); ?>"
               data-text="<?php esc_attr_e('Delete image', 'projektaffiliatetheme'); ?>">
                <?php _e('Add images to product image gallery', 'projektaffiliatetheme'); ?>
            </a>
        </p>
        <?php
    }

    /**
     * @inheritdoc
     */
    public static function update($post_id, WP_Post $post)
    {
        $attachment_ids = array();
        if (isset($_POST[self::META_KEY])) {
            $attachment_ids = array_filter(explode(',', $_POST[self::META_KEY]));
        }

        update_post_meta($post_id, '_' . self::META_KEY, implode(',', $attachment_ids));
    }
}

final class AP_Meta_Box_Manager
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

        add_action('ap_process_product_meta', 'AP_Product_Image_Gallery_Meta_Box::update', 10, 2);
    }

    /**
     * Add all available theme meta boxes
     */
    public function add_meta_boxes()
    {
        add_meta_box('ap_product_image_gallery', __('Product image gallery', 'projektaffiliatetheme'), 'AP_Product_Image_Gallery_Meta_Box::render', 'product', 'side', 'low');
    }

    /**
     * Update all available theme meta boxes
     * @param int $post_id
     * @param WP_Post $post
     */
    public function update_meta_boxes($post_id, WP_Post $post)
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

new AP_Meta_Box_Manager();
