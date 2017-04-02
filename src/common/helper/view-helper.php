<?php
namespace Affilicious_Theme\Common\Helper;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class View_Helper
{
    /**
     * Render the template immediately.
     *
     * @since 0.8
     * @param string $path The path to the directory.
     * @param array $params The variables for the template.
     */
    public static function render($path, $params = array())
    {
        // The params are extracted into simple variables
        extract($params);

        /** @noinspection PhpIncludeInspection */
        include($path);
    }

    /**
     * Render the template into a simple string.
     *
     * @since 0.8
     * @param string $path The path to the directory.
     * @param array $params  The variables for the template.
     * @return string
     */
    public static function stringify($path, $params = array())
    {
        // Every output is converted to a simple string
        ob_start();

        // The params are extracted into simple variables
        extract($params);

        /** @noinspection PhpIncludeInspection */
        include($path);

        $content = ob_get_clean();
        return $content;
    }
}
