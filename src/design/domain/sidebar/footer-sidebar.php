<?php
namespace Affilicious_Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Footer_Sidebar extends Abstract_Sidebar
{
	/**
	 * @inheritdoc
	 */
	public static function get_id()
	{
		return 'afft-footer-sidebar';
	}

	/**
	 * @inheritdoc
	 */
	public static function get_name()
	{
		return __('Footer Sidebar', 'affilicious-theme');
	}

	/**
     * @inheritdoc
     */
    public function init()
    {
        register_sidebar(array(
            'id' => self::get_id(),
            'name' => self::get_name(),
            'description' => __('Place your widgets into this sidebar, which is visible on the footer.', 'affilicious-theme'),
            'before_widget' => '<div class="col-xs-12">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
    }
}
