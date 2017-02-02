<?php
namespace Affilicious_Theme\Design\Helper;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Logo_Helper
{
    /**
     * Check if there is a default logo.
     *
     * @since 0.6
     * @return bool
     */
    public static function has_logo()
    {
        $logo = get_theme_mod('afft-information-logo');

        return !empty($logo);
    }

    /**
     * Get the default logo.
     *
     * @since 0.6
     * @return string
     */
    public static function get_logo()
    {
        $logo = get_theme_mod('afft-information-logo');

        return $logo;
    }

    /**
     * Check if there is a retina logo.
     *
     * @since 0.6
     * @return bool
     */
    public static function has_retina_logo()
    {
        $logo = get_theme_mod('afft-information-logo-retina');

        return !empty($logo);
    }

    /**
     * Get the retina logo.
     *
     * @since 0.6
     * @return string
     */
    public static function get_retina_logo()
    {
        $logo = get_theme_mod('afft-information-logo-retina');

        return $logo;
    }
}
