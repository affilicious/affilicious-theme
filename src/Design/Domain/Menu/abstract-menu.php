<?php
namespace Affilicious\Theme\Design\Domain\Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

abstract class Abstract_Menu implements Menu_Interface
{
	/**
	 * @inheritdoc
	 */
	public function exists()
	{
		return has_nav_menu($this->get_location());
	}
}
