<?php
namespace Affilicious\Theme\Menu;

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
