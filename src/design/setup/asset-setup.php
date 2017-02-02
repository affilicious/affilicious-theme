<?php
namespace Affilicious_Theme\Design\Setup;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Asset_Setup
{
    /**
     * Get the url to the public style directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_public_styles_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/public/css/';
    }

    /**
     * Get the url to the admin style directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_admin_styles_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/admin/css/';
    }

    /**
     * Get the url to the customizer style directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_customizer_styles_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/customizer/css/';
    }

    /**
     * Get the url to the public script directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_public_script_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/public/js/';
    }

    /**
     * Get the url to the admin script directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_admin_script_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/admin/js/';
    }

    /**
     * Get the url to the customizer script directory.
     *
     * @since 0.6
     * @return string
     */
    public static function get_customizer_script_url()
    {
        return \Affilicious_Theme::get_root_url() . '/assets/customizer/js/';
    }

    /**
     * Add the public styles for the front end.
     *
     * @since 0.6
     */
    public function add_public_styles()
    {
        wp_enqueue_style('affilicious-theme', self::get_public_styles_url() . 'style.min.css', array(), \Affilicious_Theme::THEME_VERSION);
    }

    /**
     * Add the admin styles for the back end.
     *
     * @since 0.6
     */
    public function add_admin_styles()
    {
        wp_enqueue_style('affilicious-theme-admin', self::get_admin_styles_url() . 'admin.min.css', array(), \Affilicious_Theme::THEME_VERSION);
    }

    /**
     * Add the public scripts for the front end.
     *
     * @since 0.6
     */
    public function add_public_scripts()
    {

        wp_enqueue_script('affilicious-theme-slick', \Affilicious_Theme::get_root_url() . '/assets/vendor/slick/js/' . 'slick.js', array(), '1.6.0', true);
        wp_register_script('affilicious-theme-public', self::get_public_script_url() . 'script.min.js', array('jquery', 'affilicious-theme-slick'), \Affilicious_Theme::THEME_VERSION, true);

        wp_localize_script('affilicious-theme-public', 'translations', array(
            'noMoreResults' => __('No more results available.', 'affilicious-theme'),
        ));

        wp_enqueue_script('affilicious-theme-public');
    }

    /**
     * Add the admin scripts for the back end.
     *
     * @since 0.6
     */
    public function add_admin_scripts()
    {
        wp_enqueue_script('affilicious-theme-admin', self::get_admin_script_url() . 'admin.min.js', array('jquery'), \Affilicious_Theme::THEME_VERSION, true);
    }

	/**
	 * Add the customizer scripts for the back end.
	 *
	 * @since 0.6
	 */
    public function add_customizer_scripts()
    {
	    wp_enqueue_script('affilicious-theme-customizer', self::get_customizer_script_url() . 'customizer.min.js', array('jquery','customize-preview'), time(), true);
    }
}
