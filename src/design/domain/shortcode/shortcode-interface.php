<?php
namespace Affilicious\Theme\Design\Domain\Shortcode;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Shortcode_Interface
{
	/**
	 * Get the name of the shortcode
	 *
	 * @since 0.3.4
	 * @return string
	 */
	public function get_name();

	/**
	 * Render the specific shortcode
	 *
	 * @since 0.3.4
	 * @param array $attr
	 * @param null|string $content
	 * @return string
	 */
	public function render($attr, $content);
}
