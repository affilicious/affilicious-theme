<?php
namespace Affilicious\Theme\Menu;

interface MenuInterface
{
	/**
	 * Get the menu location
	 *
	 * @since 0.3.5
	 * @return string
	 */
	public function getLocation();

	/**
	 * Initialize the menu
	 *
	 * @since 0.3.5
	 */
	public function init();

	/**
	 * Check if the menu exists
	 *
	 * @since 0.3.5
	 * @return bool
	 */
	public function exists();

	/**
	 * Render the menu
	 *
	 * @since 0.3.5
	 */
	public function render();
}
