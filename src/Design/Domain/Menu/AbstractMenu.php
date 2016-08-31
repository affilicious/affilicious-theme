<?php
namespace Affilicious\Theme\Design\Domain\Menu;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

abstract class AbstractMenu implements MenuInterface
{
	/**
	 * @inheritdoc
	 */
	public function exists()
	{
		return has_nav_menu($this->getLocation());
	}
}
