<?php
namespace Affilicious_Theme\Design\Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

abstract class Abstract_Menu implements Menu_Interface
{
	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public function exists()
	{
		return has_nav_menu($this->get_name());
	}
}
