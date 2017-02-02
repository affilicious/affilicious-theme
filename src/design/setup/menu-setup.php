<?php
namespace Affilicious_Theme\Design\Setup;

use Affilicious_Theme\Design\Menu\Footer_Plinth_Menu;
use Affilicious_Theme\Design\Menu\Footer_Content_First_Menu;
use Affilicious_Theme\Design\Menu\Footer_Content_Second_Menu;
use Affilicious_Theme\Design\Menu\Main_Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Menu_Setup
{
	/**
	 * @var Main_Menu
	 */
	protected $main_menu;

    /**
     * @var Footer_Plinth_Menu
     */
    protected $footer_plinth_menu;

	/**
	 * @var Footer_Content_First_Menu
	 */
	protected $footer_content_first_menu;

	/**
	 * @var Footer_Content_Second_Menu
	 */
	protected $footer_content_second_menu;

	/**
	 * @since 0.6
	 */
	public function __construct()
	{
		$this->main_menu = new Main_Menu();
		$this->footer_plinth_menu = new Footer_Plinth_Menu();
		$this->footer_content_first_menu = new Footer_Content_First_Menu();
		$this->footer_content_second_menu = new Footer_Content_Second_Menu();
	}

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function init()
	{
		$this->main_menu->init();
		$this->footer_plinth_menu->init();
		$this->footer_content_first_menu->init();
		$this->footer_content_second_menu->init();
	}

    /**
     * Get the menu which is located in the main navigation.
     *
     * @since 0.6
     * @return Main_Menu
     */
    public function get_main_menu()
    {
        return $this->main_menu;
    }

    /**
     * Get the menu which is located in the footer plinth.
     *
     * @since 0.6
     * @return Footer_Plinth_Menu
     */
    public function get_footer_plinth_menu()
    {
        return $this->footer_plinth_menu;
    }

    /**
     * Get the first menu which is located in the footer content.
     *
     * @since 0.6
     * @return Footer_Content_First_Menu
     */
    public function get_footer_content_first_menu()
    {
        return $this->footer_content_first_menu;
    }

    /**
     * Get the second menu which is located in the footer content.
     *
     * @since 0.6
     * @return Footer_Content_Second_Menu
     */
    public function get_footer_content_second_menu()
    {
        return $this->footer_content_second_menu;
    }
}
