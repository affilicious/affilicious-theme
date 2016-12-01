<?php
namespace Affilicious_Theme\Design\Domain\Widget;

use Affilicious_Theme\Design\Domain\Exception\View_Not_Found_Exception;
use Carbon_Fields\Widget\Widget;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

abstract class Abstract_Widget extends Widget
{
    /**
     * Get the directory of the widgets
     *
     * @return string
     */
    public static function get_dir()
    {
        return \Affilicious_Theme::get_root_dir() . '/src/design/domain/widget/';
    }

    /**
     * Get the directory of the widget views
     *
     * @return string
     */
    public static function get_view_dir()
    {
        return self::get_dir() . 'view/';
    }

    /**
     * Render the widget view
     *
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
            /** @noinspection _php_include_inspection */
            include($dir);
        }
    }
}
