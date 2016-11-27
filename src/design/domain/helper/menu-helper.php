<?php
namespace Affilicious_Theme\Design\Domain\Helper;

use Affilicious_Theme\Design\Domain\Menu\Bottom_1_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_2_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_3_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_4_Menu;
use Affilicious_Theme\Design\Domain\Menu\Main_Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Menu_Helper
{
	/**
	 * Get the main menu
	 *
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
	 * Get the bottom 1 menu
	 *
	 * @return Bottom_1_Menu
	 */
	public static function get_bottom_1_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$bottom_1_menu = $menu_setup->get_bottom_1_menu();

		return $bottom_1_menu;
	}

	/**
	 * Get the bottom 2 menu
	 *
	 * @return Bottom_2_Menu
	 */
	public static function get_bottom_2_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$bottom_2_menu = $menu_setup->get_bottom_2_menu();

		return $bottom_2_menu;
	}

	/**
	 * Get the bottom 3 menu
	 *
	 * @return Bottom_3_Menu
	 */
	public static function get_bottom_3_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$bottom_3_menu = $menu_setup->get_bottom_3_menu();

		return $bottom_3_menu;
	}

	/**
	 * Get the bottom 4 menu
	 *
	 * @return Bottom_4_Menu
	 */
	public static function get_bottom_4_menu()
	{
		$container = \Affilicious_Theme::get_instance()->get_container();
		$menu_setup = $container['affilicious_theme.design.setup.menu'];
		$bottom_4_menu = $menu_setup->get_bottom_4_menu();

		return $bottom_4_menu;
	}
}
