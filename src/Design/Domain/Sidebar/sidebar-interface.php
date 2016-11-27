<?php
namespace Affilicious\Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Sidebar_Interface
{
	/**
	 * Get the ID of the sidebar
	 *
	 * @since 0.4.1
	 * @return string
	 */
	public static function get_id();

	/**
	 * Get the translated name of the sidebar
	 *
	 * @since 0.4.1
	 * @return string
	 */
	public static function get_name();

    /**
     * Initialize the sidebar in Wordpress
     *
     * @see https://codex.wordpress.org/_function__reference/register_sidebar
     * @since 0.4
     */
    public function init();
}
