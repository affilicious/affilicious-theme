<?php
require_once('theme_customizer.php');

class AP_General_Customizer extends AP_Theme_Customizer
{
    /**
     * We are overwriting the default Wordpress "title_tagline" section
     * @inheritdoc
     */
    public function register($wp_customize)
    {
        $wp_customize->add_section('title_tagline', array(
            'title'     => __('General', 'projektaffiliatetheme'),
            'priority'  => 30,
        ));

        // Logo
        $wp_customize->add_setting('ap_general_logo', array(
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'ap_general_logo',
            array(
                'label'    => __('Logo', 'projektaffiliatetheme'),
                'description'   => __('Upload a logo for your site. The recommend size is <b>400x100</b> pixels, but you can use any size.', 'projektaffiliatetheme'),
                'section'  => 'title_tagline',
                'settings' => 'ap_general_logo',
            )
        ));

        // Logo Retina
        $wp_customize->add_setting('ap_general_logo_retina', array(
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'ap_general_logo_retina',
            array(
                'label'         => __('Logo Retina', 'projektaffiliatetheme'),
                'description'   => __('Upload a retina logo for your site. The recommend size is <b>800x200</b> pixels, which is 2 times larger than the regular logo.', 'projektaffiliatetheme'),
                'section'       => 'title_tagline',
                'settings'      => 'ap_general_logo_retina',
            )
        ));

        // Layout
        $wp_customize->add_setting('ap_general_layout', array(
            'default'   => 'loose',
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new WP_Customize_Control(
                $wp_customize,
                'ap_general_layout',
                array(
                    'label'         => __('Layout', 'projektaffiliatetheme'),
                    'description'   => __('Choose a layout for your website. All available layouts are mobile-friendly.', 'projektaffiliatetheme'),
                    'section'       => 'title_tagline',
                    'settings'      => 'ap_general_layout',
                    'type'          => 'radio',
                    'choices'       => array(
                        'loose' => __('Loose', 'projektaffiliatetheme'),
                        'tight' => __('Tight', 'projektaffiliatetheme')
                    )
                )
        ));
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        ?>
        <?php
    }
}

$ap_general_customizer = new AP_General_Customizer();
add_action('customize_register', array(&$ap_general_customizer, 'register'));
add_action('wp_head', array(&$ap_general_customizer, 'render'));
