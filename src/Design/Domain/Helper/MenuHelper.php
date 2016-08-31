<?php
namespace Affilicious\Theme\Design\Domain\Helper;

use Affilicious\Theme\Design\Domain\Menu\Footer1Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer2Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer3Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer4Menu;
use Affilicious\Theme\Design\Domain\Menu\MainMenu;

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
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
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
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
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
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
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
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
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
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
		$footer4Menu = $menuSetup->getFooter4Menu();

		return $footer4Menu;
	}
}
