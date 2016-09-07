<?php
namespace Affilicious\Theme\Settings\Application\Setting;

use Affilicious\Settings\Application\Setting\SettingsInterface;
use Carbon_Fields\Container as CarbonContainer;
use Carbon_Fields\Field as CarbonField;

class DesignSettings implements SettingsInterface
{
	const SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION = 'affilicious_theme_settings_design_links_product_image_gallery_click_action';
	const SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION =  'affilicious_theme_settings_design_links_product_preview_image_click_action';

	/**
	 * @inheritdoc
	 * @since 0.5
	 */
	public function render()
	{
		do_action('affilicious_theme_settings_design_before_render');

		$linkTabs = apply_filters('affilicious_theme_settings_design_links_fields', array(
			CarbonField::make('radio', self::SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION, __('What will happen, if you click on the product image gallery?', 'affilicious-theme'))
				->add_options(array(
					'none' => __('Nothing', 'affilicious-theme'),
					'open_shop' => __('Open the shop', 'affilicious-theme'),
				)),
			CarbonField::make('radio', self::SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION, __('What will happen, if you click on the product preview image?', 'affilicious-theme'))
				->add_options(array(
					'none' => __('Nothing', 'affilicious-theme'),
					'open_shop' => __('Open the shop', 'affilicious-theme'),
				)),
		));

		$container = CarbonContainer::make('theme_options', __('Design', 'affilicious-theme'))
			->set_page_parent('Affilicious')
            ->add_tab(__('Links', 'affilicious-theme'), $linkTabs);

		apply_filters('affilicious_theme_settings_design_container', $container);
		do_action('affilicious_theme_settings_design_after_render');
	}

	/**
	 * @inheritdoc
	 * @since 0.5
	 */
	public function apply()
	{
		do_action('affilicious_theme_settings_design_before_apply');

		//TODO: Place your code here

		do_action('affilicious_theme_settings_design_after_apply');
	}
}
