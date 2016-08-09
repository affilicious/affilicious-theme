<?php
namespace Affilicious\Theme\Helper;

use Affilicious\Theme\Setup\MenuSetup;
use Affilicious\Theme\Walker\BootstrapWalker;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MenuHelper
{
    /**
     * Check if there is a main menu.
     *
     * @since 0.2
     * @return bool
     */
    public static function hasMainMenu()
    {
        return has_nav_menu(MenuSetup::MAIN_MENU);
    }

    /**
     * Get the main menu.
     * This method prints the menu directly.
     *
     * @since 0.2
     */
    public static function getMainMenu()
    {
        wp_nav_menu(array(
            'menu_id' => 'nav-main-menu',
            'theme_location' => MenuSetup::MAIN_MENU,
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'top-menu',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new BootstrapWalker()
        ));
    }

    /**
     * Check if there is a bottom menu.
     *
     * @since 0.2
     * @return bool
     */
    public static function hasBottomMenu()
    {
        return has_nav_menu(MenuSetup::BOTTOM_MENU);
    }

    /**
     * Get the bottom menu.
     * This method prints the menu directly.
     *
     * @since 0.2
     */
    public static function getBottomMenu()
    {
        wp_nav_menu(array(
            'menu' => 'footer_links',
            'theme_location' => MenuSetup::BOTTOM_MENU,
            'depth' => 2,
            'container' => 'nav',
            'container_class' => 'navbar-collapse',
            'container_id' => 'bottom-menu',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new BootstrapWalker()
        ));
    }
}
