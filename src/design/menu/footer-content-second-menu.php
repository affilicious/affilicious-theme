<?php
namespace Affilicious_Theme\Design\Menu;

use Affilicious_Theme\Design\Walker\Footer_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Footer_Content_Second_Menu extends Abstract_Menu
{
    const NAME = 'afft_footer_content_second';

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
			__('Footer Content Second Menu', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function render()
	{
		$theme_locations = get_nav_menu_locations();
		$menu_obj = get_term($theme_locations[$this->get_name()], 'nav_menu');
		$menu_name = $menu_obj->name;

		wp_nav_menu(array(
			'theme_location' => $this->get_name(),
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
