<?php
namespace Affilicious\Theme\Helper;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class LayoutHelper
{
    const LOOSE = 'loose';
    const TIGHT = 'tight';

    /**
     * Check if the layout is loose
     * @return bool
     */
    public static function isLoose()
    {
        $layout = get_theme_mod('affilicious_theme_general_layout');
        return $layout === self::LOOSE || $layout === false;
    }

    /**
     * Check if the layout is tight
     * @return bool
     */
    public static function isTight()
    {
        $layout = get_theme_mod('affilicious_theme_general_layout');
        return $layout === self::TIGHT;
    }
}
