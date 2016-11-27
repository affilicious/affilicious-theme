<?php
namespace Affilicious\Theme\Common\Application\Setup;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Asset_Setup
{
    /**
     * Get the url to the style directory
     *
     * @since 0.2
     * @return string
     */
    public static function get_styles_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/css/';
    }

    /**
     * Get the url to the script directory
     *
     * @since 0.2
     * @return string
     */
    public static function get_script_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/js/';
    }

    /**
     * Add the public styles for the front end
     *
     * @since 0.2
     */
    public function add_public_styles()
    {
        wp_enqueue_style('bootstrap', self::get_styles_url() . 'bootstrap.min.css', array(), '3.3.6');
        wp_enqueue_style('bootflat', self::get_styles_url() . 'bootflat.min.css', array('bootstrap'), '204');
        wp_enqueue_style('font-awesome', self::get_styles_url() . 'font-awesome.min.css', array(), '3.2.1');
        wp_enqueue_style('slick', self::get_styles_url() . 'slick.css', array(), '1.6.0');
        wp_enqueue_style('slick-theme', self::get_styles_url() . 'slick-theme.css', array('slick'), '1.6.0');
        wp_enqueue_style('affilicious-theme', self::get_styles_url() . 'style.min.css', array('font-awesome', 'bootflat', 'slick-theme'), \Affilicious_Theme::THEME_VERSION);
    }

    /**
     * Add the admin styles for the back end
     *
     * @since 0.2
     */
    public function add_admin_styles()
    {
        wp_enqueue_style('affilicious-theme-admin', self::get_styles_url() . 'admin.min.css', array(), \Affilicious_Theme::THEME_VERSION);
    }

    /**
     * Add the public scripts for the front end
     *
     * @since 0.2
     */
    public function add_public_scripts()
    {
        wp_enqueue_script('bootstrap', self::get_script_url() . 'bootstrap.min.js', array(), '3.3.6', true);
        wp_enqueue_script('slick', self::get_script_url() . 'slick.min.js', array(), '1.6.0', true);
        wp_enqueue_script('retina-script', self::get_script_url() . 'retina.min.js', array(), '2.0.0', true);
        wp_enqueue_script('icheck', self::get_script_url() . 'icheck.min.js', array(), '1.0.1', true);
        wp_enqueue_script('selector', self::get_script_url() . 'jquery.fs.selector.min.js', array('jquery'), '3.1.2', true);
        wp_enqueue_script('stepper', self::get_script_url() . 'jquery.fs.stepper.min.js', array('jquery'), '3.0.7', true);
        wp_enqueue_script('responsive-bootstrap-toolkit', self::get_script_url() . 'responsive-bootstrap-toolkit.min.js', array('jquery'), '1.5.0', true);
        wp_enqueue_script('affilicious-theme', self::get_script_url() . 'script.min.js', array('jquery', 'responsive-bootstrap-toolkit', 'bootstrap', 'slick', 'retina-script', 'icheck', 'selector', 'stepper'), \Affilicious_Theme::THEME_VERSION, true);
    }

    /**
     * Add the admin scripts for the back end
     *
     * @since 0.2
     */
    public function add_admin_scripts()
    {
        wp_enqueue_script('affilicious-theme-admin', self::get_script_url() . 'admin.min.js', array('jquery'), \Affilicious_Theme::THEME_VERSION, true);
    }

	/**
	 * Add the customizer scripts for the back end
	 *
	 * @since 0.4
	 */
    public function add_customizer_scripts()
    {
	    wp_enqueue_script('affilicious-theme-customizer', self::get_script_url() . 'customize.min.js', array('jquery','customize-preview'), time(), true);
    }
}
