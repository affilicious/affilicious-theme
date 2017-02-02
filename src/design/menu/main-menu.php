<?php
namespace Affilicious_Theme\Design\Menu;

use Affilicious_Theme\Design\Walker\Bootstrap_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Main_Menu extends Abstract_Menu
{
    const NAME = 'afft_main';

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function get_name()
	{
		return self::NAME;
	}

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function init()
	{
		register_nav_menu(
			$this->get_name(),
			__('Main Menu', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function render()
	{
		wp_nav_menu(array(
			'theme_location' => $this->get_name(),
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
