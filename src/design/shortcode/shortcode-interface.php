<?php
namespace Affilicious_Theme\Design\Shortcode;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Shortcode_Interface
{
	/**
	 * Get the name of the shortcode.
	 *
	 * @since 0.6
	 * @return string
	 */
	public function get_name();

	/**
	 * Render the specific shortcode.
	 *
	 * @since 0.6
	 * @param array $attr
	 * @param null|string $content
	 * @return string
	 */
	public function render($attr, $content);
}
