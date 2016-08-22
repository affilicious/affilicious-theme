<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AssetSetup
{
    /**
     * Get the url to the style directory
     *
     * @since 0.2
     * @return string
     */
    public static function getStylesUrl()
    {
        return \AffiliciousTheme::getRootUrl() . '/assets/css/';
    }

    /**
     * Get the url to the script directory
     *
     * @since 0.2
     * @return string
     */
    public static function getScriptUrl()
    {
        return \AffiliciousTheme::getRootUrl() . '/assets/js/';
    }

    /**
     * Add the public styles for the front end
     *
     * @since 0.2
     */
    public function addPublicStyles()
    {
        wp_enqueue_style('bootstrap', self::getStylesUrl() . 'bootstrap.min.css', array(), '3.3.6');
        wp_enqueue_style('font-awesome', self::getStylesUrl() . 'font-awesome.min.css', array(), '3.2.1');
        wp_enqueue_style('slick', self::getStylesUrl() . 'slick.css', array(), '1.6.0');
        wp_enqueue_style('slick-theme', self::getStylesUrl() . 'slick-theme.css', array('slick'), '1.6.0');
        wp_enqueue_style('affilicious-theme', self::getStylesUrl() . 'style.css', array('font-awesome', 'bootstrap', 'slick', 'slick-theme'), \AffiliciousTheme::THEME_VERSION);
    }

    /**
     * Add the admin styles for the back end
     *
     * @since 0.2
     */
    public function addAdminStyles()
    {
        wp_enqueue_style('affilicious-theme-admin', self::getStylesUrl() . 'admin.css', array(), \AffiliciousTheme::THEME_VERSION);
    }

    /**
     * Add the public scripts for the front end
     *
     * @since 0.2
     */
    public function addPublicScripts()
    {
        wp_enqueue_script('bootstrap', self::getScriptUrl() . 'bootstrap.min.js', array(), '3.3.6', true);
        wp_enqueue_script('slick', self::getScriptUrl() . 'slick.min.js', array(), '1.6.0', true);
        wp_enqueue_script('retina-script', self::getScriptUrl() . 'retina.min.js', array(), '2.0.0', true);
        wp_enqueue_script('affilicious-theme', self::getScriptUrl() . 'script.js', array('jquery', 'bootstrap', 'slick', 'retina-script'), \AffiliciousTheme::THEME_VERSION, true);
    }

    /**
     * Add the admin scripts for the back end
     *
     * @since 0.2
     */
    public function addAdminScripts()
    {
        wp_enqueue_script('affilicious-theme-admin', self::getScriptUrl() . 'admin.js', array('jquery'), \AffiliciousTheme::THEME_VERSION, true);
    }
}
