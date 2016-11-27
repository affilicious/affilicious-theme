<?php
namespace Affilicious_Theme\Design\Application\Setup;

use Affilicious_Theme\Design\Domain\Menu\Bottom_1_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_2_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_3_Menu;
use Affilicious_Theme\Design\Domain\Menu\Bottom_4_Menu;
use Affilicious_Theme\Design\Domain\Menu\Main_Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Menu_Setup
{
	/**
	 * @var Main_Menu
	 */
	private $main_menu;

	/**
	 * @var Bottom_1_Menu
	 */
	private $bottom1_menu;

	/**
	 * @var Bottom_2_Menu
	 */
	private $bottom2_menu;

	/**
	 * @var Bottom_3_Menu
	 */
	private $bottom3_menu;

	/**
	 * @var Bottom_4_Menu
	 */
	private $bottom4_menu;

	/**
	 * @since 0.3.4
	 */
	public function __construct()
	{
		$this->main_menu    = new Main_Menu();
		$this->bottom1_menu = new Bottom_1_Menu();
		$this->bottom2_menu = new Bottom_2_Menu();
		$this->bottom3_menu = new Bottom_3_Menu();
		$this->bottom4_menu = new Bottom_4_Menu();
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		$this->main_menu->init();
		$this->bottom1_menu->init();
		$this->bottom2_menu->init();
		$this->bottom3_menu->init();
		$this->bottom4_menu->init();
	}

	/**
	 * @return Main_Menu
	 */
	public function get_main_menu()
	{
		return $this->main_menu;
	}

	/**
	 * @return Bottom_1_Menu
	 */
	public function get_bottom_1_menu()
	{
		return $this->bottom1_menu;
	}

	/**
	 * @return Bottom_2_Menu
	 */
	public function get_bottom_2_menu()
	{
		return $this->bottom2_menu;
	}

	/**
	 * @return Bottom_3_Menu
	 */
	public function get_bottom_3_menu()
	{
		return $this->bottom3_menu;
	}

	/**
	 * @return Bottom_4_Menu
	 */
	public function get_bottom_4_menu()
	{
		return $this->bottom4_menu;
	}
}
