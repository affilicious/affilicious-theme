<?php
namespace Affilicious\Theme\Helper;

use Affilicious\Theme\Menu\Footer1Menu;
use Affilicious\Theme\Menu\Footer2Menu;
use Affilicious\Theme\Menu\Footer3Menu;
use Affilicious\Theme\Menu\Footer4Menu;
use Affilicious\Theme\Menu\MainMenu;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MenuHelper
{
	/**
	 * Get the main menu
	 *
	 * @return MainMenu
	 */
	public static function getMainMenu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.layout.setup.menu'];
		$mainMenu = $menuSetup->getMainMenu();

		return $mainMenu;
	}

	/**
	 * Get the footer 1 menu
	 *
	 * @return Footer1Menu
	 */
	public static function getFooter1Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.layout.setup.menu'];
		$footer1Menu = $menuSetup->getFooter1Menu();

		return $footer1Menu;
	}

	/**
	 * Get the footer 2 menu
	 *
	 * @return Footer2Menu
	 */
	public static function getFooter2Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.layout.setup.menu'];
		$footer3Menu = $menuSetup->getFooter2Menu();

		return $footer3Menu;
	}

	/**
	 * Get the footer 3 menu
	 *
	 * @return Footer3Menu
	 */
	public static function getFooter3Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.layout.setup.menu'];
		$footer3Menu = $menuSetup->getFooter3Menu();

		return $footer3Menu;
	}

	/**
	 * Get the footer 4 menu
	 *
	 * @return Footer4Menu
	 */
	public static function getFooter4Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.layout.setup.menu'];
		$footer4Menu = $menuSetup->getFooter4Menu();

		return $footer4Menu;
	}
}
