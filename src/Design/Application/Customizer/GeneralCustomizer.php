<?php
namespace Affilicious\Theme\Design\Application\Customizer;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class GeneralCustomizer extends AbstractThemeCustomizer
{
    /**
     * We are overwriting the default Wordpress "title_tagline" section
     * @inheritdoc
     */
    public function register(\WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_section('title_tagline', array(
            'title'     => __('General', 'affilicious-theme'),
            'priority'  => 30,
        ));

        // Copyright
        $wp_customize->add_setting('affilicious_theme_copyright_text', array(
            'section' => 'title_tagline',
        ));

        $wp_customize->add_control(
            'affilicious_theme_copyright_text',
            array(
                'label' => __('Copyright Text', 'affilicious-theme'),
                'section' => 'title_tagline',
                'type' => 'text',
            )
        );

        // Logo
        $wp_customize->add_setting('affilicious_theme_general_logo', array(
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new \WP_Customize_Image_Control(
            $wp_customize,
            'affilicious_theme_general_logo',
            array(
                'label'    => __('Logo', 'affilicious-theme'),
                'description'   => __('Upload a logo for your site. The recommend size is <b>400x100</b> pixels, but you can use any size.', 'affilicious-theme'),
                'section'  => 'title_tagline',
                'settings' => 'affilicious_theme_general_logo',
            )
        ));

        // Logo Retina
        $wp_customize->add_setting('affilicious_theme_general_logo_retina', array(
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new \WP_Customize_Image_Control(
            $wp_customize,
            'affilicious_theme_general_logo_retina',
            array(
                'label'         => __('Logo Retina', 'affilicious-theme'),
                'description'   => __('Upload a retina logo for your site. The recommend size is <b>800x200</b> pixels, which is 2 times larger than the regular logo.', 'affilicious-theme'),
                'section'       => 'title_tagline',
                'settings'      => 'affilicious_theme_general_logo_retina',
            )
        ));

        // Layout
        $wp_customize->add_setting('affilicious_theme_general_layout', array(
            'default'   => 'loose',
            'section'   => 'title_tagline',
        ));

        $wp_customize->add_control(new \WP_Customize_Control(
                $wp_customize,
                'affilicious_theme_general_layout',
                array(
                    'label'         => __('Layout', 'affilicious-theme'),
                    'description'   => __('Choose a layout for your website. All available layouts are mobile-friendly.', 'affilicious-theme'),
                    'section'       => 'title_tagline',
                    'settings'      => 'affilicious_theme_general_layout',
                    'type'          => 'radio',
                    'choices'       => array(
                        'loose' => __('Loose', 'affilicious-theme'),
                        'tight' => __('Tight', 'affilicious-theme')
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
