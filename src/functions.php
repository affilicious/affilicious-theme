<?php
use Affilicious\Theme\Helper\LayoutHelper;
use Affilicious\Theme\Helper\LogoHelper;
use Affilicious\Theme\Helper\MenuHelper;
use Affilicious\Product\Domain\Helper\PostHelper;
use Affilicious\Product\Domain\Model\Product;
use Affilicious\Theme\Setup\SidebarSetup;
use Affilicious\Theme\Walker\BootstrapCommentWalker;

/**
 * Check if the layout is loose
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_is_loose_layout()
{
    return LayoutHelper::isLoose();
}

/**
 * Check if the layout is tight
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_is_tight_layout()
{
    return LayoutHelper::isTight();
}

/**
 * Check if there is a main menu.
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_has_main_menu()
{
	$mainMenu = MenuHelper::getMainMenu();
	$result = $mainMenu->exists();

    return $result;
}

/**
 * Get the main menu.
 *
 * @since 0.2
 */
function affilicious_theme_main_menu()
{
	$mainMenu = MenuHelper::getMainMenu();
	$mainMenu->render();
}

/**
 * Check if there is a footer 1 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function affilicious_theme_has_footer_1_menu()
{
	$footer1Menu = MenuHelper::getFooter1Menu();
	$result = $footer1Menu->exists();

	return $result;
}

/**
 * Get the footer 1 menu.
 *
 * @since 0.3.4
 */
function affilicious_theme_footer_1_menu()
{
	$footer1Menu = MenuHelper::getFooter1Menu();
	$footer1Menu->render();
}

/**
 * Check if there is a footer 2 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function affilicious_theme_has_footer_2_menu()
{
	$footer2Menu = MenuHelper::getFooter2Menu();
	$result = $footer2Menu->exists();

	return $result;
}

/**
 * Get the footer 2 menu.
 *
 * @since 0.3.4
 */
function affilicious_theme_footer_2_menu()
{
	$footer2Menu = MenuHelper::getFooter2Menu();
	$footer2Menu->render();
}

/**
 * Check if there is a footer 3 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function affilicious_theme_has_footer_3_menu()
{
	$footer3Menu = MenuHelper::getFooter3Menu();
	$result = $footer3Menu->exists();

	return $result;
}

/**
 * Get the footer 3 menu.
 *
 * @since 0.3.4
 */
function affilicious_theme_footer_3_menu()
{
	$footer3Menu = MenuHelper::getFooter3Menu();
	$footer3Menu->render();
}

/**
 * Check if there is a footer 4 menu.
 *
 * @since 0.3.4
 * @return bool
 */
function affilicious_theme_has_footer_4_menu()
{
	$footer4Menu = MenuHelper::getFooter4Menu();
	$result = $footer4Menu->exists();

	return $result;
}

/**
 * Get the footer 4 menu.
 *
 * @since 0.3.4
 */
function affilicious_theme_footer_4_menu()
{
	$footer4Menu = MenuHelper::getFooter4Menu();
	$footer4Menu->render();
}

/**
 * Check if there is a default logo.
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_has_logo()
{
    return LogoHelper::hasLogo();
}

/**
 * Get the default logo.
 *
 * @since 0.2
 * @return string
 */
function affilicious_theme_get_logo()
{
    return LogoHelper::getLogo();
}

/**
 * Check if there is a retina logo.
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_has_retina_logo()
{
    return LogoHelper::hasRetinaLogo();
}

/**
 * Get the retina logo.
 *
 * @since 0.2
 * @return string
 */
function affilicious_theme_get_retina_logo()
{
    return LogoHelper::getRetinaLogo();
}

/**
 * Check if the product sidebar is active.
 *
 * @since 0.3
 * @param int|\WP_Post|Product|null $productOrId
 * @return bool
 */
function affilicious_theme_is_active_product_sidebar($productOrId = null)
{
    $post = PostHelper::getPost($productOrId);
    $sidebar = carbon_get_post_meta($post->ID, SidebarSetup::PRODUCT_SIDEBAR);
    if (empty($sidebar)) {
        return false;
    }

    $active = is_dynamic_sidebar($sidebar);

    return $active;
}

/**
 * Get the product sidebar.
 * This function prints the result directly to the screen.
 *
 * @since 0.4
 * @param int|\WP_Post|Product|null $productOrId
 */
function affilicious_theme_get_product_sidebar($productOrId = null)
{
    $post = PostHelper::getPost($productOrId);
    $sidebar = carbon_get_post_meta($post->ID, SidebarSetup::PRODUCT_SIDEBAR);
    if (!empty($sidebar)) {
        dynamic_sidebar($sidebar);
    }
}

/**
 * List the comments with bootstrap components.
 * This function is just a wrapper for wp_list_comments.
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_list_comments
 * @since 0.3.4
 * @param array $args
 */
function affilicious_theme_list_comments($args = array())
{
	$args = wp_parse_args($args, array(
		'style'       => 'ul',
		'max_depth'   => 1,
		'short_ping'  => true,
		'avatar_size' => '64',
		'walker'      => new BootstrapCommentWalker(),
	));

	wp_list_comments($args);
}
