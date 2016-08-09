<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MenuSetup
{
    const MAIN_MENU = 'main-menu';
    const BOTTOM_MENU = 'bottom-menu';

    /**
     * Register the main menu
     *
     * @since 0.2
     */
    public function registerMainMenu()
    {
        register_nav_menu(self::MAIN_MENU, __('Main Navigation', 'affilicious-theme'));
    }

    /**
     * Register the bottom menu
     *
     * @since 0.2
     */
    public function registerBottomMenu()
    {
        register_nav_menu(self::BOTTOM_MENU, __('Bottom Navigation', 'affilicious-theme'));
    }
}
