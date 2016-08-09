<?php
namespace Affilicious\Theme\Admin\Customizer;

class ThemeCustomizerManager
{
    /**
     * @var ThemeCustomizerInterface[]
     */
    private $themeCustomizers;

    /**
     * Manages the theme customizer
     */
    public function __construct()
    {
        $this->addThemeCustomizer(new GeneralCustomizer());
        $this->addThemeCustomizer(new HeaderCustomizer());

        add_action('customize_register', array($this, 'register'));
        add_action('wp_head', array($this, 'render'));
    }

    /**
     * Register all available theme customizer modules
     * @param \WP_Customize_Manager $wp_customize
     */
    public function register(\WP_Customize_Manager $wp_customize)
    {
        foreach ($this->themeCustomizers as $themeCustomizer) {
            $themeCustomizer->register($wp_customize);
        }
    }

    /**
     * Render all available theme customizer modules
     */
    public function render()
    {
        foreach ($this->themeCustomizers as $themeCustomizer) {
            $themeCustomizer->render();
        }
    }

    /**
     * Add a new theme customizer module to the manager
     * @param ThemeCustomizerInterface $themeCustomizer
     */
    public function addThemeCustomizer(ThemeCustomizerInterface $themeCustomizer)
    {
        $this->themeCustomizers[get_class($themeCustomizer)] = $themeCustomizer;
    }
}
