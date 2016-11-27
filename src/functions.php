<?php
use Affilicious_Theme\Design\Domain\Helper\Menu_Helper;
use Affilicious_Theme\Design\Domain\Helper\Logo_Helper;
use Affilicious\Product\Domain\Model\Product_Interface;
use Affilicious\Product\Domain\Model\Variant\Product_Variant_Interface;
use Affilicious_Theme\Design\Application\Setup\Sidebar_Setup;
use Affilicious_Theme\Settings\Application\Setting\Design_Settings;
use Affilicious_Theme\Design\Domain\Walker\Bootstrap_Comment_Walker;

/**
 * Check if every requirement like the main plugin is installed correctly
 * before we can print anything to the screen.
 * Print an error message if the required Affilicious Plugin is missing.
 *
 * @since 0.3.5
 */
function afft_check_requirements()
{
	if (!class_exists('\Affilicious_Plugin')) {
		wp_footer();
		echo '<br><br><br>';
		exit(__('Failed to find the required Affilicious Plugin. Please open your admin area and install the missing plugin.', 'affilicious-theme'));
	}
}

/**
 * Check if there is a main menu.
 *
 * @since 0.2
 * @return bool
 */
function afft_has_main_menu()
{
	$main_menu = Menu_Helper::get_main_menu();
	$result = $main_menu->exists();

    return $result;
}

/**
 * Get the main menu.
 *
 * @since 0.2
 */
function afft_main_menu()
{
	$main_menu = Menu_Helper::get_main_menu();
	$main_menu->render();
}

/**
 * Check if there is a footer 1 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function afft_has_bottom_1_menu()
{
	$footer1_menu = Menu_Helper::get_bottom_1_menu();
	$result = $footer1_menu->exists();

	return $result;
}

/**
 * Get the footer 1 menu.
 *
 * @since 0.3.4
 */
function afft_bottom_1_menu()
{
	$footer1_menu = Menu_Helper::get_bottom_1_menu();
	$footer1_menu->render();
}

/**
 * Check if there is a footer 2 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function afft_has_bottom_2_menu()
{
	$footer2_menu = Menu_Helper::get_bottom_2_menu();
	$result = $footer2_menu->exists();

	return $result;
}

/**
 * Get the footer 2 menu.
 *
 * @since 0.3.4
 */
function afft_bottom_2_menu()
{
	$footer2_menu = Menu_Helper::get_bottom_2_menu();
	$footer2_menu->render();
}

/**
 * Check if there is a footer 3 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function afft_has_bottom_3_menu()
{
	$footer3_menu = Menu_Helper::get_bottom_3_menu();
	$result = $footer3_menu->exists();

	return $result;
}

/**
 * Get the footer 3 menu.
 *
 * @since 0.3.4
 */
function afft_bottom_3_menu()
{
	$footer3_menu = Menu_Helper::get_bottom_3_menu();
	$footer3_menu->render();
}

/**
 * Check if there is a footer 4 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function afft_has_bottom_4_menu()
{
	$footer4_menu = Menu_Helper::get_bottom_4_menu();
	$result = $footer4_menu->exists();

	return $result;
}

/**
 * Get the footer 4 menu.
 *
 * @since 0.3.4
 */
function afft_bottom_4_menu()
{
	$footer4_menu = Menu_Helper::get_bottom_4_menu();
	$footer4_menu->render();
}

/**
 * Check if there is a default logo.
 *
 * @since 0.2
 * @return bool
 */
function afft_has_logo()
{
    return Logo_Helper::has_logo();
}

/**
 * Get the default logo.
 *
 * @since 0.2
 * @return string
 */
function afft_get_logo()
{
    return Logo_Helper::get_logo();
}

/**
 * Check if there is a retina logo.
 *
 * @since 0.2
 * @return bool
 */
function afft_has_retina_logo()
{
    return Logo_Helper::has_retina_logo();
}

/**
 * Get the retina logo.
 *
 * @since 0.2
 * @return string
 */
function afft_get_retina_logo()
{
    return Logo_Helper::get_retina_logo();
}

/**
 * Check if the product sidebar is active.
 *
 * @since 0.3
 * @param int|\WP_Post|Product_Interface|null $product_or_id
 * @return bool
 */
function afft_is_active_product_sidebar($product_or_id = null)
{
    $product = aff_get_product($product_or_id);
    if($product === null) {
        return false;
    }

    if($product instanceof Product_Variant_Interface) {
        $product = $product->get_parent();
    }

    if(!$product->has_id()) {
        return false;
    }

    $sidebar = carbon_get_post_meta($product->get_id()->get_value(), Sidebar_Setup::PRODUCT_SIDEBAR);
    if (empty($sidebar)) {
        return false;
    }

    return true;
}

/**
 * Get the product sidebar.
 * This function prints the result directly to the screen.
 *
 * @since 0.4
 * @param int|\WP_Post|Product_Interface|null $product_or_id
 * @return bool
 */
function afft_get_product_sidebar($product_or_id = null)
{
    $product = aff_get_product($product_or_id);
    if($product === null) {
        return false;
    }

    if($product instanceof Product_Variant_Interface) {
        $product = $product->get_parent();
    }

    if(!$product->has_id()) {
        return false;
    }

    $sidebar = carbon_get_post_meta($product->get_id()->get_value(), Sidebar_Setup::PRODUCT_SIDEBAR);
    if (!empty($sidebar)) {
        dynamic_sidebar($sidebar);

        return true;
    }

    return false;
}

/**
 * List the comments with bootstrap components.
 * This function is just a wrapper for wp_list_comments.
 *
 * @see https://codex.wordpress.org/_function__reference/wp_list_comments
 * @since 0.3.4
 * @param array $args
 */
function afft_list_comments($args = array())
{
	$args = wp_parse_args($args, array(
		'style'       => 'ul',
		'max_depth'   => 1,
		'short_ping'  => true,
		'avatar_size' => '64',
		'walker'      => new Bootstrap_Comment_Walker(),
	));

	wp_list_comments($args);
}

/**
 * Check if we have to link the product image gallerie with an affiliate link
 *
 * @since 0.4.2
 * @return bool
 */
function afft_link_product_image_gallery()
{
	$raw = carbon_get_theme_option(Design_Settings::SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION);
	$result = $raw === 'open_shop' ? true : false;

	return $result;
}

/**
 * Check if we have to link the product preview image with an affiliate link
 *
 * @since 0.4.2
 * @return bool
 */
function afft_link_product_preview_image()
{
	$raw = carbon_get_theme_option(Design_Settings::SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION);
	$result = $raw === 'open_shop' ? true : false;

	return $result;
}

/**
 * Check if the post has the current post type
 *
 * @since 0.4.2
 * @param $type
 * @return bool
 */
function afft_is_post_type($type)
{
	global $wp_query;

	if($type == get_post_type($wp_query->post->_i_d)) {
		return true;
	}

	return false;
}
