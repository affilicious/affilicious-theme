<?php
namespace Affilicious_Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Main_Sidebar extends Abstract_Sidebar
{
	/**
	 * @inheritdoc
	 */
	public static function get_id()
	{
		return 'main-sidebar';
	}

	/**
	 * @inheritdoc
	 */
	public static function get_name()
	{
		return __('Main Sidebar', 'affilicious-theme');
	}

	/**
     * @inheritdoc
     */
    public function init()
    {
        register_sidebar(array(
            'id' => self::get_id(),
            'name' => self::get_name(),
            'description' => __('Place your widgets into this sidebar, which is visible on every page.', 'affilicious-theme'),
            'before_widget' => '<li><div class="panel panel-default">',
            'after_widget' => '</div></li>',
            'before_title' => '<div class="panel-heading"><h4>',
            'after_title' => '</h4></div>',
        ));
    }
}
