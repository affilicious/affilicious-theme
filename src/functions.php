<?php
use Affilicious_Theme\Design\Domain\Helper\Menu_Helper;
use Affilicious_Theme\Design\Domain\Helper\Logo_Helper;
use Affilicious\Product\Domain\Model\Product_Interface;
use Affilicious\Product\Domain\Model\Variant\Product_Variant_Interface;
use Affilicious_Theme\Design\Application\Setup\Sidebar_Setup;
use Affilicious_Theme\Settings\Application\Setting\Design_Settings;
use Affilicious_Theme\Design\Domain\Walker\Bootstrap_Comment_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

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
 * Check the absence of the menu which is located in the main navigation.
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
 * Print the menu which is located in the main navigation.
 *
 * @since 0.6
 */
function afft_the_main_menu()
{
	$main_menu = Menu_Helper::get_main_menu();
	$main_menu->render();
}

/**
 * Check the absence of the menu which is located in the footer plinth.
 *
 * @since 0.6
 * @return bool
 */
function afft_has_footer_plinth_menu()
{
	$menu = Menu_Helper::get_footer_plinth_menu();
	$exists = $menu->exists();

	return $exists;
}

/**
 * Print the menu which is located in the footer plinth.
 *
 * @since 0.6
 */
function afft_the_footer_plinth_menu()
{
    $main_menu = Menu_Helper::get_footer_plinth_menu();
    $main_menu->render();
}

/**
 * Check the absence of the first menu which is located in the footer content.
 *
 * @since 0.6
 * @return bool
 */
function afft_has_footer_content_first_menu()
{
    $menu = Menu_Helper::get_footer_content_first_menu();
    $exists = $menu->exists();

    return $exists;
}

/**
 * Print the first menu which is located in the footer content.
 *
 * @since 0.6
 */
function afft_the_footer_content_first_menu()
{
    $main_menu = Menu_Helper::get_footer_content_first_menu();
    $main_menu->render();
}

/**
 * Check the absence of the second menu which is located in the footer content.
 *
 * @since 0.6
 * @return bool
 */
function afft_has_footer_content_second_menu()
{
    $menu = Menu_Helper::get_footer_content_second_menu();
    $exists = $menu->exists();

    return $exists;
}

/**
 * Print the second menu which is located in the footer content.
 *
 * @since 0.6
 */
function afft_the_footer_content_second_menu()
{
    $main_menu = Menu_Helper::get_footer_content_second_menu();
    $main_menu->render();
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

/**
 * Check if the website has a copyright text.
 *
 * @since 0.6
 * @return bool
 */
function afft_has_copyright()
{
    $copyright = get_theme_mod('afft-information-copyright-text');
    $result = !empty($copyright);

    return $result;
}

/**
 * Get the copyright text of the website.
 *
 * @since 0.6
 * @return string
 */
function afft_get_copyright()
{
    $copyright = get_theme_mod('afft-information-copyright-text');

    return $copyright;
}

/**
 * Print the copyright text of the website.
 *
 * @since 0.6
 */
function afft_the_copyright()
{
    echo afft_get_copyright();
}

/**
 * Check if the breadcrumbs are enabled.
 * This function uses the Yoast SEO breadcrumbs. Please install the related plugin:
 * https://de.wordpress.org/plugins/wordpress-seo/
 *
 * @since 0.6
 * @return bool
 */
function afft_has_breadcrumbs()
{
    if(!function_exists('yoast_breadcrumb')) {
        return false;
    }

    $internalLinks = get_option('wpseo_internallinks', null);
    if(!isset($internalLinks['breadcrumbs-enable']) || $internalLinks['breadcrumbs-enable'] == false) {
        return false;
    }

    return true;
}

/**
 * Print the breadcrumbs.
 * This function uses the Yoast SEO breadcrumbs. Please install the related plugin:
 * https://de.wordpress.org/plugins/wordpress-seo/
 *
 * @since 0.6
 */
function afft_the_breadcrumbs()
{
    if(afft_has_breadcrumbs()) {
        yoast_breadcrumb('<nav aria-label="breadcrumb" role="navigation">', '</nav>');
    }
}
