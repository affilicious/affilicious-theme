<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AssetSetup
{
    /**
     * Get the path to the style directory
     *
     * @since 0.2
     * @return string
     */
    public static function getStylesDir()
    {
        return \AffiliciousTheme::getRootDir() . '/assets/css/';
    }

    /**
     * Get the path to the script directory
     *
     * @since 0.2
     * @return string
     */
    public static function getScriptDir()
    {
        return \AffiliciousTheme::getRootDir() . '/assets/js/';
    }

    /**
     * Add the public styles for the front end
     *
     * @since 0.2
     */
    public function addPublicStyles()
    {
        wp_enqueue_style('bootstrap', self::getStylesDir() . 'bootstrap.min.css', array(), '3.3.6');
        wp_enqueue_style('font-awesome', self::getStylesDir() . 'font-awesome.min.css', array(), '3.2.1');
        wp_enqueue_style('affilicious-theme', self::getStylesDir() . 'style.css', array('font-awesome', 'bootstrap'), \AffiliciousTheme::THEME_VERSION);
    }

    /**
     * Add the admin styles for the back end
     *
     * @since 0.2
     */
    public function addAdminStyles()
    {
        wp_enqueue_style('affilicious-theme-admin', self::getStylesDir() . 'admin.css', array(), \AffiliciousTheme::THEME_VERSION);
    }

    /**
     * Add the public scripts for the front end
     *
     * @since 0.2
     */
    public function addPublicScripts()
    {
        wp_enqueue_script('bootstrap', self::getScriptDir() . 'bootstrap.min.js', array(), '3.3.6', true);
        wp_enqueue_script('retina-script', self::getScriptDir() . 'retina.min.js', array(), '2.0.0', true);
        wp_enqueue_script('affilicious-theme', self::getScriptDir() . 'script.js', array('jquery'), \AffiliciousTheme::THEME_VERSION, true);
    }

    /**
     * Add the admin scripts for the back end
     *
     * @since 0.2
     */
    public function addAdminScripts()
    {
        wp_enqueue_script('affilicious-theme-admin', self::getScriptDir() . 'admin.js', array('jquery'), \AffiliciousTheme::THEME_VERSION, true);
    }
}
