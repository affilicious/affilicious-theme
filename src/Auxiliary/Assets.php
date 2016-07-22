<?php
namespace ProjektAffiliateTheme\Auxiliary;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Assets
{
    /**
     * Hook into all required Wordpress actions
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'add_public_styles'), 10);
        add_action('wp_enqueue_scripts', array($this, 'add_public_scripts'), 20);
        add_action('admin_enqueue_scripts', array($this, 'add_admin_styles'), 30);
        add_action('admin_enqueue_scripts', array($this, 'add_admin_scripts'), 40);
    }

    /**
     * Add the public styles for the front end
     */
    public function add_public_styles()
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '3.2.1');
        wp_enqueue_style('projektaffiliatetheme', get_template_directory_uri() . '/assets/css/style.css', array('font-awesome', 'bootstrap'), '0.1.0');
    }

    /**
     * Add the admin styles for the back end
     */
    public function add_admin_styles()
    {
        wp_enqueue_style('projektaffiliatetheme-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '0.1.0');
    }

    /**
     * Add the public scripts for the front end
     */
    public function add_public_scripts()
    {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.6', true);
        wp_enqueue_script('retina-script', get_template_directory_uri() . '/assets/js/retina.min.js', array(), '2.0.0', true);
        wp_enqueue_script('projektaffiliatetheme', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '0.1.0', true);
    }

    /**
     * Add the admin scripts for the back end
     */
    public function add_admin_scripts()
    {
        wp_enqueue_script('projektaffiliatetheme-admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), '0.1.0', true);
    }
}

new Assets();
