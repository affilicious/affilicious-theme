<?php
namespace Affilicious\Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

interface SidebarInterface
{
	/**
	 * Get the ID of the sidebar
	 *
	 * @since 0.4.1
	 * @return string
	 */
	public static function getId();

	/**
	 * Get the translated name of the sidebar
	 *
	 * @since 0.4.1
	 * @return string
	 */
	public static function getName();

    /**
     * Initialize the sidebar in Wordpress
     *
     * @see https://codex.wordpress.org/Function_Reference/register_sidebar
     * @since 0.4
     */
    public function init();
}
