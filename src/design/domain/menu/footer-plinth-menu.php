<?php
namespace Affilicious_Theme\Design\Domain\Menu;

use Affilicious_Theme\Design\Domain\Walker\Footer_Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Footer_Plinth_Menu extends Abstract_Menu
{
	/**
	 * @inheritdoc
	 */
	public function get_location()
	{
		return 'afft_footer_plinth';
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		register_nav_menu(
			$this->get_location(),
			__('Footer Plinth Menu', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function render()
	{
		wp_nav_menu(array(
			'theme_location' => $this->get_location(),
			'depth' => 1,
            'container' => '',
			'fallback_cb' => false,
		));
	}
}
