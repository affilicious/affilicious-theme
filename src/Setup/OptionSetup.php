<?php
namespace Affilicious\Theme\Setup;

use Affilicious\Common\Application\Setup\SetupInterface;
use Carbon_Fields\Container;
use Carbon_Fields\Field\Field;

class OptionSetup implements SetupInterface
{
	/**
	 * @inheritdoc
	 * @since 0.3.4
	 */
	public function init()
	{
		// Nothing to do here
	}

	/**
	 * @inheritdoc
	 * @since 0.3.4
	 */
	public function render()
	{
		Container::make('theme_options', 'Affilicious Theme')
	         ->set_icon('dashicons-admin-generic')
	         ->add_tab(__('Scripts'), array(
		         Field::make('header_scripts', 'affilicious_theme_custom_css', __('Custom CSS', 'affilicious-theme')),
		         Field::make('footer_scripts', 'affilicious_theme_custom_js', __('Custom JS', 'affilicious-theme')),
	         ));
	}
}
