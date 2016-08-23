<?php
use Affilicious\Theme\Helper\LayoutHelper;
use Affilicious\Theme\Helper\LogoHelper;
use Affilicious\Theme\Helper\MenuHelper;
use Affilicious\Product\Domain\Helper\PostHelper;
use Affilicious\Product\Domain\Model\Product;
use Affilicious\Theme\Setup\SidebarSetup;

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
    return MenuHelper::hasMainMenu();
}

/**
 * Get the main menu.
 *
 * @since 0.2
 */
function affilicious_theme_main_menu()
{
    MenuHelper::getMainMenu();
}

/**
 * Check if there is a bottom menu.
 *
 * @since 0.2
 * @return bool
 */
function affilicious_theme_has_bottom_menu()
{
    return MenuHelper::hasBottomMenu();
}

/**
 * Get the bottom menu.
 *
 * @since 0.2
 */
function affilicious_theme_bottom_menu()
{
    MenuHelper::getBottomMenu();
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
