<?php
namespace Affilicious_Theme\Design\Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Footer_Plinth_Menu extends Abstract_Menu
{
    const NAME = 'afft_footer_plinth';

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
			__('Footer Plinth Menu', 'affilicious-theme')
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
			'depth' => 1,
            'container' => '',
			'fallback_cb' => false,
		));
	}
}
