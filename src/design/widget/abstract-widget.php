<?php
namespace Affilicious_Theme\Design\Widget;

use Affilicious_Theme\Design\Exception\View_Not_Found_Exception;
use Carbon_Fields\Widget\Widget;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

abstract class Abstract_Widget extends Widget
{
    /**
     * Get the directory of the widget views.
     *
     * @since 0.6
     * @return string
     */
    public static function get_view_dir()
    {
        return \Affilicious_Theme::get_root_path() . '/src/design/presentation/widget/view';
    }

    /**
     * Render the widget view.
     *
     * @since 0.6
     * @param string $name
     * @param array $args
     */
    public function render($name, array $args, array $instance)
    {
        $dir = self::get_view_dir(). $name;
        if(!preg_match('/.php$/', $dir)) {
            $dir .= '.php';
        }

        if (!file_exists($dir)) {
            throw new View_Not_Found_Exception($name, $dir);
        } else {
            /** @noinspection PhpIncludeInspection */
            include($dir);
        }
    }
}
