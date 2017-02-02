<?php
namespace Affilicious_Theme\Design\Sidebar;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Sidebar_Interface
{
	/**
	 * Get the name of the sidebar.
	 *
	 * @since 0.6
	 * @return string
	 */
	public function get_name();

    /**
     * Initialize the sidebar in Wordpress.
     *
     * @see https://codex.wordpress.org/_function__reference/register_sidebar
     * @since 0.6
     */
    public function init();
}
