<?php
namespace Affilicious\Theme\Setup;

use Affilicious\Theme\Helper\LayoutHelper;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ContentSetup
{
    const EXCERPT_LENGTH = 30;

	/**
	 * Remove the annoying image dimensions in the entry and product content
	 *
	 * @since 0.3.4
	 * @param string $html
	 * @return string
	 */
	public function removeImgDimensions($html)
	{
		$html = preg_replace('/(width|height)=["\']\d*["\']\s?/', "", $html);

		return $html;
	}

    /**
     * Set the default table class
     *
     * @since 0.2
     * @param string $content
     * @return string
     */
    public function setTableClass($content)
    {
        return str_replace('<table>', '<table class="table table-bordered table-striped">', $content);
    }

    /**
     * Set the default excerpt length
     *
     * @since 0.2
     * @return int
     */
    function setExcerptLength()
    {
        return self::EXCERPT_LENGTH;
    }

    /**
     * Set the layout class into the body
     *
     * @since 0.2
     * @param string[] $classes
     * @return string[]
     */
    public function setBodyClass($classes)
    {
        if (LayoutHelper::isLoose()) {
            $classes[] = LayoutHelper::LOOSE;
        } elseif (LayoutHelper::isTight()) {
            $classes[] = LayoutHelper::TIGHT;
        }

        return $classes;
    }
}
