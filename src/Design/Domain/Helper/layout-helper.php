<?php
namespace Affilicious\Theme\Design\Domain\Helper;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Layout_Helper
{
    const LOOSE = 'loose';
    const TIGHT = 'tight';

    /**
     * Check if the layout is loose
     * @return bool
     */
    public static function is_loose()
    {
        $layout = get_theme_mod('afft_general_layout');
        return $layout === self::LOOSE || $layout === false;
    }

    /**
     * Check if the layout is tight
     * @return bool
     */
    public static function is_tight()
    {
        $layout = get_theme_mod('afft_general_layout');
        return $layout === self::TIGHT;
    }
}
