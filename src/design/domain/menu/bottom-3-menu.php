<?php
namespace Affilicious\Theme\Design\Domain\Menu;

use Affilicious\Theme\Design\Domain\Walker\Footer_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Bottom_3_Menu extends Abstract_Menu
{
	/**
	 * @inheritdoc
	 */
	public function get_location()
	{
		return 'bottom_3';
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		register_nav_menu(
			$this->get_location(),
			__('Bottom 3 Menu', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function render()
	{
		$theme_locations = get_nav_menu_locations();
		$menu_obj = get_term($theme_locations[$this->get_location()], 'nav_menu');
		$menu_name = $menu_obj->name;

		wp_nav_menu(array(
			'theme_location' => $this->get_location(),
			'walker' => new Footer_Walker(),
			'depth' => 1,
			'container' => '',
			'menu' => 'dl',
			'menu_class' => 'footer-nav',
			'fallback_cb' => false,
			'items_wrap' => '<dl class="%2$s"><dt class="nav-title">' . esc_html($menu_name) .'</dt>%3$s</dl>'
		));
	}
}
