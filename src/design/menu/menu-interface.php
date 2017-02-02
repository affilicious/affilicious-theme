<?php
namespace Affilicious_Theme\Design\Menu;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Menu_Interface
{
	/**
	 * Get the menu name.
	 *
	 * @since 0.6
	 * @return string
	 */
	public function get_name();

	/**
	 * Initialize the menu.
	 *
	 * @since 0.6
	 */
	public function init();

	/**
	 * Check if the menu is existing.
	 *
	 * @since 0.6
	 * @return bool
	 */
	public function exists();

	/**
	 * Render the menu.
	 *
	 * @since 0.6
	 */
	public function render();
}
