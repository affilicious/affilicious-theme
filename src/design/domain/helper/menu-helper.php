<?php
namespace Affilicious_Theme\Design\Domain\Helper;

use Affilicious_Theme\Design\Domain\Menu\Footer_Content_First_Menu;
use Affilicious_Theme\Design\Domain\Menu\Footer_Content_Second_Menu;
use Affilicious_Theme\Design\Domain\Menu\Footer_Plinth_Menu;
use Affilicious_Theme\Design\Domain\Menu\Main_Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Menu_Helper
{
	/**
	 * Get the menu which is located in the main navigation.
	 *
     * @since 0.6
	 * @return Main_Menu
	 */
	public static function get_main_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$mainMenu = $menu_setup->get_main_menu();

		return $mainMenu;
	}

	/**
     * Get the menu which is located in the footer plinth.
     *
     * @since 0.6
	 * @return Footer_Plinth_Menu
	 */
	public static function get_footer_plinth_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$menu = $menu_setup->get_footer_plinth_menu();

		return $menu;
	}

    /**
     * Get the first menu which is located in the footer content.
     *
     * @since 0.6
     * @return Footer_Content_First_Menu
     */
	public static function get_footer_content_first_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$menu = $menu_setup->get_footer_content_first_menu();

		return $menu;
	}

    /**
     * Get the second menu which is located in the footer content.
     *
     * @since 0.6
     * @return Footer_Content_Second_Menu
     */
    public static function get_footer_content_second_menu()
    {
        $container = \Affilicious_Theme::get_instance()->get_container();
        $menu_setup = $container['affilicious_theme.design.setup.menu'];
        $menu = $menu_setup->get_footer_content_second_menu();

        return $menu;
    }
}
