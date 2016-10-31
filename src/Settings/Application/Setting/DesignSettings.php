<?php
namespace Affilicious\Theme\Settings\Application\Setting;

use Affilicious\Settings\Application\Setting\Settings_Interface;
use Affilicious\Theme\Design\Application\Service\CustomizerModsBackupService;
use Carbon_Fields\Container as CarbonContainer;
use Carbon_Fields\Field as CarbonField;

class DesignSettings implements Settings_Interface
{
	const SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION = 'affilicious_theme_settings_design_links_product_image_gallery_click_action';
	const SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION =  'affilicious_theme_settings_design_links_product_preview_image_click_action';

    /**
     * @var CustomizerModsBackupService
     */
    private $customizerModsBackup;

    /**
     * @since 0.5
     * @param CustomizerModsBackupService $customizerModsBackup
     */
    public function __construct(CustomizerModsBackupService $customizerModsBackup)
    {
        $this->customizerModsBackup = $customizerModsBackup;
    }

    /**
	 * @inheritdoc
	 * @since 0.5
	 */
	public function render()
	{
		do_action('affilicious_theme_settings_design_before_render');

		$link_tab = apply_filters('affilicious_theme_settings_design_container_links_tab', array(
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

        $customizer_tab = apply_filters('affilicious_theme_settings_design_container_customizer_tab', array(
            CarbonField::make('textarea', 'affilicious_theme_settings_design_container_customizer_tab_raw_modifications_field', __('Raw Modifications', 'affilicious-theme'))
                ->set_default_value($this->customizerModsBackup->get_theme_mods())
                ->set_help_text(__('Please be aware that ill-considered changes may destroy your design.', 'affilicious-theme')),
        ));

		$container = CarbonContainer::make('theme_options', __('Design', 'affilicious-theme'))
			->set_page_parent('Affilicious')
            ->add_tab(__('Links', 'affilicious-theme'), $link_tab)
            ->add_tab(__('Customizer'), $customizer_tab);


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
