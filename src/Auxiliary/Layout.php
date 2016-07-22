<?php
namespace ProjektAffiliateTheme\Auxiliary;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Layout
{
    /**
     * Layout constructor.
     */
    public function __construct()
    {
        add_filter('body_class', array($this, 'appendBodyClass'));
    }

    /**
     * Check if the layout is loose
     * @return bool
     */
    public static function isLoose()
    {
        $layout = get_theme_mod('ap_general_layout');
        return $layout === 'loose' || $layout === false;
    }

    /**
     * Check if the layout is tight
     * @return bool
     */
    public static function isTight()
    {
        $layout = get_theme_mod('ap_general_layout');
        return $layout === 'tight';
    }

    /**
     * Append the layout class into the body
     * @param string[] $classes
     * @return string[]
     */
    public function appendBodyClass($classes)
    {
        if (self::isLoose()) {
            $classes[] = 'loose';
        } elseif (self::isTight()) {
            $classes[] = 'tight';
        }

        return $classes;

    }
}
