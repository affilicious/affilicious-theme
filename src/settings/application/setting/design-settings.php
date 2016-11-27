<?php
namespace Affilicious_Theme\Settings\Application\Setting;

use Affilicious\Settings\Application\Setting\Settings_Interface;
use Affilicious_Theme\Design\Application\Service\Customizer_Mods_Backup_Service;
use Carbon_Fields\Container as Carbon_Container;
use Carbon_Fields\Field as Carbon_Field;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Design_Settings implements Settings_Interface
{
	const SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION = 'affilicious_theme_options_design_container_links_tab_product_image_gallery_click_action_field';
	const SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION =  'affilicious_theme_options_design_container_links_tab_product_preview_image_click_action_field';

    /**
     * @var Customizer_Mods_Backup_Service
     */
    private $customizer_mods_backup;

    /**
     * @since 0.5
     * @param Customizer_Mods_Backup_Service $customizer_mods_backup
     */
    public function __construct(Customizer_Mods_Backup_Service $customizer_mods_backup)
    {
        $this->customizer_mods_backup = $customizer_mods_backup;
    }

    /**
	 * @inheritdoc
	 * @since 0.5
	 */
	public function render()
	{
		do_action('affilicious_theme_options_design_before_render');

		$links_tab = apply_filters('affilicious_theme_options_design_container_links_tab', array(
			Carbon_Field::make('radio', self::SETTING_PRODUCT_IMAGE_GALLERY_CLICK_ACTION, __('What will happen, if you click on the product image gallery?', 'affilicious-theme'))
				->add_options(array(
					'none' => __('Nothing', 'affilicious-theme'),
					'open_shop' => __('Open the shop', 'affilicious-theme'),
				)),
			Carbon_Field::make('radio', self::SETTING_PRODUCT_PREVIEW_IMAGE_CLICK_ACTION, __('What will happen, if you click on the product preview image?', 'affilicious-theme'))
				->add_options(array(
					'none' => __('Nothing', 'affilicious-theme'),
					'open_shop' => __('Open the shop', 'affilicious-theme'),
				)),
		));

        $customizer_tab = apply_filters('affilicious_theme_options_design_container_customizer_tab', array(
            Carbon_Field::make('textarea', 'affilicious_theme_options_design_container_customizer_tab_raw_modifications_field', __('Raw Modifications', 'affilicious-theme'))
                ->set_default_value($this->customizer_mods_backup->get_theme_mods())
                ->set_help_text(__('Please be aware that ill-considered changes may destroy your design.', 'affilicious-theme')),
        ));

		$container = Carbon_Container::make('theme_options', __('Design', 'affilicious-theme'))
			->set_page_parent('affilicious')
            ->add_tab(__('Links', 'affilicious-theme'), $links_tab)
            ->add_tab(__('Customizer'), $customizer_tab);

		apply_filters('affilicious_theme_options_design_container', $container);
		do_action('affilicious_theme_options_design_after_render');
	}

	/**
	 * @inheritdoc
	 * @since 0.5
	 */
	public function apply()
	{
		do_action('affilicious_theme_options_design_before_apply');

		//TODO: Place your code here

		do_action('affilicious_theme_options_design_after_apply');
	}
}
