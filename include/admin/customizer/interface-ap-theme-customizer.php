<?php
if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

interface AP_Theme_Customizer_Interface
{
    /**
     * Register the theme customizer section, setting and options
     * @param WP_Customize_Manager $wp_customize
     */
    public function register($wp_customize);

    /**
     * Render the custom CSS into the header
     */
    public function render();
}
