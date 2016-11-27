<?php
namespace Affilicious_Theme\Design\Domain\Helper;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Logo_Helper
{
    /**
     * Check if there is a default logo
     *
     * @since 0.2
     * @return bool
     */
    public static function has_logo()
    {
        $logo = get_theme_mod('afft-information-logo');
        return $logo != null;
    }

    /**
     * Get the default logo
     *
     * @return string
     */
    public static function get_logo()
    {
        return get_theme_mod('afft-information-logo');
    }

    /**
     * Check if there is a retina logo
     *
     * @return bool
     */
    public static function has_retina_logo()
    {
        $logo = get_theme_mod('afft-information-logo-retina');
        return $logo != null;
    }

    /**
     * Get the retina logo
     *
     * @return string
     */
    public static function get_retina_logo()
    {
        return get_theme_mod('afft-information-logo-retina');
    }
}
