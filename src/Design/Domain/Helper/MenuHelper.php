<?php
namespace Affilicious\Theme\Design\Domain\Helper;

use Affilicious\Theme\Design\Domain\Menu\Bottom1Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom2Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom3Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom4Menu;
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
	 * Get the bottom 1 menu
	 *
	 * @return Bottom1Menu
	 */
	public static function getBottom1Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
		$bottom1Menu = $menuSetup->getBottom1Menu();

		return $bottom1Menu;
	}

	/**
	 * Get the bottom 2 menu
	 *
	 * @return Bottom2Menu
	 */
	public static function getBottom2Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
		$bottom3Menu = $menuSetup->getBottom2Menu();

		return $bottom3Menu;
	}

	/**
	 * Get the bottom 3 menu
	 *
	 * @return Bottom3Menu
	 */
	public static function getBottom3Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
		$bottom3Menu = $menuSetup->getBottom3Menu();

		return $bottom3Menu;
	}

	/**
	 * Get the bottom 4 menu
	 *
	 * @return Bottom4Menu
	 */
	public static function getBottom4Menu()
	{
		$container = \AffiliciousTheme::getInstance()->getContainer();
		$menuSetup = $container['affilicious.theme.design.setup.menu'];
		$bottom4Menu = $menuSetup->getBottom4Menu();

		return $bottom4Menu;
	}
}
