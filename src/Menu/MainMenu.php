<?php
namespace Affilicious\Theme\Menu;

use Affilicious\Theme\Walker\BootstrapWalker;

class MainMenu extends AbstractMenu
{
	/**
	 * @inheritdoc
	 */
	public function getLocation()
	{
		return 'main';
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		register_nav_menu(
			$this->getLocation(),
			__('Main Navigation', 'affilicious-theme')
		);
	}

	/**
	 * @inheritdoc
	 */
	public function render()
	{
		wp_nav_menu(array(
			'theme_location' => $this->getLocation(),
			'menu_id' => 'nav-main-menu',
			'depth' => 2,
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id' => 'top-menu',
			'menu_class' => 'nav navbar-nav',
			'fallback_cb' => false,
			'walker' => new BootstrapWalker(),
		));
	}
}
