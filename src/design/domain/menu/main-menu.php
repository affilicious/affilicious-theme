<?php
namespace Affilicious\Theme\Design\Domain\Menu;

use Affilicious\Theme\Design\Domain\Walker\Bootstrap_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Main_Menu extends Abstract_Menu
{
	/**
	 * @inheritdoc
	 */
	public function get_location()
	{
		return 'main';
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		register_nav_menu(
			$this->get_location(),
			__('Main Menu', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function render()
	{
		wp_nav_menu(array(
			'theme_location' => $this->get_location(),
			'menu_id' => 'nav-main-menu',
			'depth' => 2,
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id' => 'top-menu',
			'menu_class' => 'nav navbar-nav',
			'fallback_cb' => false,
			'walker' => new Bootstrap_Walker(),
		));
	}
}
