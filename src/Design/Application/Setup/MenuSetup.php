<?php
namespace Affilicious\Theme\Design\Application\Setup;

use Affilicious\Theme\Design\Domain\Menu\Bottom1Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom2Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom3Menu;
use Affilicious\Theme\Design\Domain\Menu\Bottom4Menu;
use Affilicious\Theme\Design\Domain\Menu\MainMenu;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MenuSetup
{
	/**
	 * @var MainMenu
	 */
	private $mainMenu;

	/**
	 * @var Bottom1Menu
	 */
	private $bottom1Menu;

	/**
	 * @var Bottom2Menu
	 */
	private $bottom2Menu;

	/**
	 * @var Bottom3Menu
	 */
	private $bottom3Menu;

	/**
	 * @var Bottom4Menu
	 */
	private $bottom4Menu;

	/**
	 * @since 0.3.4
	 */
	public function __construct()
	{
		$this->mainMenu    = new MainMenu();
		$this->bottom1Menu = new Bottom1Menu();
		$this->bottom2Menu = new Bottom2Menu();
		$this->bottom3Menu = new Bottom3Menu();
		$this->bottom4Menu = new Bottom4Menu();
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		$this->mainMenu->init();
		$this->bottom1Menu->init();
		$this->bottom2Menu->init();
		$this->bottom3Menu->init();
		$this->bottom4Menu->init();
	}

	/**
	 * @return MainMenu
	 */
	public function getMainMenu()
	{
		return $this->mainMenu;
	}

	/**
	 * @return Bottom1Menu
	 */
	public function getBottom1Menu()
	{
		return $this->bottom1Menu;
	}

	/**
	 * @return Bottom2Menu
	 */
	public function getBottom2Menu()
	{
		return $this->bottom2Menu;
	}

	/**
	 * @return Bottom3Menu
	 */
	public function getBottom3Menu()
	{
		return $this->bottom3Menu;
	}

	/**
	 * @return Bottom4Menu
	 */
	public function getBottom4Menu()
	{
		return $this->bottom4Menu;
	}
}
