<?php
namespace Affilicious_Theme\Design\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

interface Customizer_Interface
{
	/**
	 * Init the options for the theme customizer.
	 *
	 * @since 0.6
	 * @return array
	 */
	public function init();

	/**
	 * Render the options of the theme customizer.
	 *
	 * @since 0.6
	 */
	public function render();

	/**
	 * Enqueue all necessary scripts and styles.
	 *
	 * @since 0.6
	 */
	public function enqueue_scripts();
}
