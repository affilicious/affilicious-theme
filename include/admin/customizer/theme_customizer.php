<?php


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

abstract class AP_Theme_Customizer implements AP_Theme_Customizer_Interface
{
    /**
     * Helper method for generating css
     * @param string $selector
     * @param string $key
     * @param string $name
     * @param bool $retinaOnly
     * @param bool $echo
     * @return string
     */
    protected function css($selector, $key, $name, $retinaOnly = false, $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($name);

        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }', $selector, $key, $mod);

            if($retinaOnly) {
                $return = sprintf("
                    @media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
                           only screen and (-moz-min-device-pixel-ratio: 1.5),
                           only screen and (-o-min-device-pixel-ratio: 3/2),
                           only screen and (min-device-pixel-ratio: 1.5) { %s }",
                    $return
                );
            }

            if ($echo) {
                echo $return;
            }
        }
        return $return;
    }
}
