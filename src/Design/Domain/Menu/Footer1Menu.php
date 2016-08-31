<?php
namespace Affilicious\Theme\Design\Domain\Menu;

use Affilicious\Theme\Design\Domain\Walker\FooterWalker;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Footer1Menu extends AbstractMenu
{
	/**
	 * @inheritdoc
	 */
	public function getLocation()
	{
		return 'footer_1';
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		register_nav_menu(
			$this->getLocation(),
			__('Footer 1 Navigation', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function render()
	{
		$theme_locations = get_nav_menu_locations();
		$menu_obj = get_term( $theme_locations[$this->getLocation()], 'nav_menu' );
		$menu_name = $menu_obj->name;

		wp_nav_menu(array(
			'theme_location' => $this->getLocation(),
			'walker' => new FooterWalker(),
			'depth' => 1,
			'container' => '',
			'menu' => 'dl',
			'menu_class' => 'footer-nav',
			'fallback_cb' => false,
			'items_wrap' => '<dl class="%2$s"><dt class="nav-title">' . esc_html($menu_name) .'</dt>%3$s</dl>'
		));
	}
}
