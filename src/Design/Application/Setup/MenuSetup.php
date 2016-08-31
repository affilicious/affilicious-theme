<?php
namespace Affilicious\Theme\Design\Application\Setup;

use Affilicious\Theme\Design\Domain\Menu\Footer1Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer2Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer3Menu;
use Affilicious\Theme\Design\Domain\Menu\Footer4Menu;
use Affilicious\Theme\Design\Domain\Menu\MainMenu;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MenuSetup
{
	/**
	 * @var MainMenu
	 */
	private $mainMenu;

	/**
	 * @var Footer1Menu
	 */
	private $footer1Menu;

	/**
	 * @var Footer2Menu
	 */
	private $footer2Menu;

	/**
	 * @var Footer3Menu
	 */
	private $footer3Menu;

	/**
	 * @var Footer4Menu
	 */
	private $footer4Menu;

	/**
	 * @since 0.3.4
	 */
	public function __construct()
	{
		$this->mainMenu = new MainMenu();
		$this->footer1Menu = new Footer1Menu();
		$this->footer2Menu = new Footer2Menu();
		$this->footer3Menu = new Footer3Menu();
		$this->footer4Menu = new Footer4Menu();
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		$this->mainMenu->init();
		$this->footer1Menu->init();
		$this->footer2Menu->init();
		$this->footer3Menu->init();
		$this->footer4Menu->init();
	}

	/**
	 * @return MainMenu
	 */
	public function getMainMenu()
	{
		return $this->mainMenu;
	}

	/**
	 * @return Footer1Menu
	 */
	public function getFooter1Menu()
	{
		return $this->footer1Menu;
	}

	/**
	 * @return Footer2Menu
	 */
	public function getFooter2Menu()
	{
		return $this->footer2Menu;
	}

	/**
	 * @return Footer3Menu
	 */
	public function getFooter3Menu()
	{
		return $this->footer3Menu;
	}

	/**
	 * @return Footer4Menu
	 */
	public function getFooter4Menu()
	{
		return $this->footer4Menu;
	}
}
