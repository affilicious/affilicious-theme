<?php
namespace Affilicious_Theme\Design\Presentation\Setup;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Content_Setup
{
    const EXCERPT_LENGTH = 30;

	/**
	 * Remove the annoying image dimensions in the entry and product content
	 *
	 * @since 0.6
	 * @param string $html
	 * @return string
	 */
	public function remove_img_dimensions($html)
	{
		$html = preg_replace('/(width|height)=["\']\d*["\']\s?/', "", $html);

		return $html;
	}

    /**
     * Set the default table class
     *
     * @since 0.6
     * @param string $content
     * @return string
     */
    public function set_table_class($content)
    {
        return str_replace('<table>', '<table class="table table-bordered table-striped">', $content);
    }

    /**
     * Set the default excerpt length
     *
     * @since 0.6
     * @return int
     */
    function set_excerpt_length()
    {
        return self::EXCERPT_LENGTH;
    }

	/**
	 * Add a wrapper to iframes to handle the sizing correctly
	 *
	 * @since 0.6
	 * @param string $content
	 * @return string
	 */
	function wrap_fluid_media($content) {
		// Match any iframes
		$pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
		preg_match_all($pattern, $content, $matches);

		foreach ($matches[0] as $match) {
			// Wrap matched iframe with div
			$wrapped_frame = '<div class="fluid-media">' . $match . '</div>';

			// Replace original iframe with new in content
			$content = str_replace($match, $wrapped_frame, $content);
		}

		return $content;
	}
}
