<?php
namespace Affilicious\Theme\Design\Domain\Widget;

use Affilicious\Theme\Design\Domain\Exception\ViewNotFoundException;
use Carbon_Fields\Widget\Widget;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

abstract class AbstractWidget extends Widget
{
    /**
     * Get the directory of the widgets
     *
     * @return string
     */
    public static function getDir()
    {
        return \AffiliciousTheme::getRootDir() . '/src/Design/Domain/Widget/';
    }

    /**
     * Get the directory of the widget views
     *
     * @return string
     */
    public static function getViewDir()
    {
        return self::getDir() . 'View/';
    }

    /**
     * Render the widget view
     *
     * @param string $name
     * @param array $args
     */
    public function render($name, array $args, array $instance)
    {
        $dir = self::getViewDir(). $name;
        if(!preg_match('/.php$/', $dir)) {
            $dir .= '.php';
        }

        if (!file_exists($dir)) {
            throw new ViewNotFoundException($name, $dir);
        } else {
            /** @noinspection PhpIncludeInspection */
            include($dir);
        }
    }
}
