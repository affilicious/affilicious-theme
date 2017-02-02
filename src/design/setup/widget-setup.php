<?php
namespace Affilicious_Theme\Design\Setup;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Widget_Setup
{
    const TAG_CLOUD_SMALLEST = 80;
    const TAG_CLOUD_LARGEST = 160;
    const TAG_CLOUD_UNIT = '%';

    /**
     * Register all widgets.
     *
     * @since 0.6
     */
    public function register_widgets()
    {
        if (class_exists('Carbon_Fields\Widget\Widget')) {
            //register_widget('Affilicious_Theme\Design\Widget\Details_Widget');
        }
    }

    /**
     * Modify the widget tag cloud.
     *
     * @since 0.6
     * @param array $args
     * @return array
     */
    public function modifiy_tag_cloud($args)
    {
        $args['class'] = 'tag';
        $args['largest'] = self::TAG_CLOUD_LARGEST;
        $args['smallest'] = self::TAG_CLOUD_SMALLEST;
        $args['unit'] = self::TAG_CLOUD_UNIT;

        return $args;
    }
}
