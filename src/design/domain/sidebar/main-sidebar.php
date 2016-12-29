<?php
namespace Affilicious_Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Main_Sidebar extends Abstract_Sidebar
{
	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public static function get_id()
	{
		return 'afft-main-sidebar';
	}

	/**
	 * @inheritdoc
     * @since 0.6
	 */
	public static function get_name()
	{
		return __('Main Sidebar', 'affilicious-theme');
	}

	/**
     * @inheritdoc
     * @since 0.6
     */
    public function init()
    {
        register_sidebar(array(
            'id' => self::get_id(),
            'name' => self::get_name(),
            'description' => __('Place your widgets into this sidebar, which is visible on every page.', 'affilicious-theme'),
            'before_widget' => '<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12"><div class="widget">',
            'before_title' => '<div class="widget-heading"><h4 class="widget-headline">',
            'after_title' => '</h4></div><div class="widget-body">',
            'after_widget' => '</div></div></div>',
        ));
    }
}
