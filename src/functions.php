<?php
use Affilicious\Theme\Helper\LayoutHelper;
use Affilicious\Theme\Helper\LogoHelper;
use Affilicious\Theme\Helper\MenuHelper;

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
