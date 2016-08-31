<?php
namespace Affilicious\Theme\Design\Application\Customizer;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class HeaderCustomizer extends AbstractThemeCustomizer
{
    /**
     * @inheritdoc
     */
    public function register(\WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_section('ap_section_header' , array(
            'title'     => __('Header', 'affilicious-theme'),
            'priority'  => 30,
        ));

        // Background Color
        $wp_customize->add_setting('ap_header_background_color' , array(
            'default'   => '#FFFFFF',
            'section'   => 'ap_section_header',
        ));

        $wp_customize->add_control(new \WP_Customize_Color_Control(
            $wp_customize,
            'ap_header_background_color',
            array(
                'label'     => __('Background color', 'affilicious-theme'),
                'section'   => 'ap_section_header',
                'settings'  => 'ap_header_background_color',
            )
        ));

        // Title Font Color
        $wp_customize->add_setting('ap_header_title_font_color' , array(
            'default'   => '#000000',
            'section'   => 'ap_section_header',
        ));

        $wp_customize->add_control(new \WP_Customize_Color_Control(
            $wp_customize,
            'ap_header_title_font_color',
            array(
                'label'     => __('Title Font Color', 'affilicious-theme'),
                'section'   => 'ap_section_header',
                'settings'  => 'ap_header_title_font_color',
            )
        ));

        // Tagline Font Color
        $wp_customize->add_setting('ap_header_tagline_font_color' , array(
            'default'   => '#777777',
            'section'   => 'ap_section_header',
        ));

        $wp_customize->add_control(new \WP_Customize_Color_Control(
            $wp_customize,
            'ap_header_tagline_font_color',
            array(
                'label'     => __('Tagline Font Color', 'affilicious-theme'),
                'section'   => 'ap_section_header',
                'settings'  => 'ap_header_tagline_font_color',
            )
        ));
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        ?>
        <!-- Theme Header Customizer CSS-->
        <style type="text/css">
            <?php self::css('#header', 'background-color', 'ap_header_background_color', '#FFFFFF'); ?>
            <?php self::css('#title', 'color', 'ap_header_title_font_color', '#000000'); ?>
            <?php self::css('#tagline', 'color', 'ap_header_tagline_font_color', '#777777'); ?>
        </style>
        <?php
    }
}
