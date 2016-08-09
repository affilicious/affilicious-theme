<?php
namespace Affilicious\Theme\Admin\Customizer;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

interface ThemeCustomizerInterface
{
    /**
     * Register the theme customizer section, setting and options
     * @param \WP_Customize_Manager $wp_customize
     */
    public function register(\WP_Customize_Manager $wp_customize);

    /**
     * Render the custom CSS into the header
     */
    public function render();
}
