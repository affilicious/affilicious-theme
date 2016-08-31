<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class WidgetSetup
{
    const TAG_CLOUD_SMALLEST = 80;
    const TAG_CLOUD_LARGEST = 160;
    const TAG_CLOUD_UNIT = '%';

    /**
     * Register all widgets
     *
     * @since 0.2
     */
    public function registerWidgets()
    {
        if (class_exists('Carbon_Fields\Widget\Widget')) {
            register_widget('Affilicious\Theme\Widget\PriceComparisonWidget');
            register_widget('Affilicious\Theme\Widget\DetailsWidget');
        }
    }

    /**
     * Modify the widget tag cloud
     *
     * @since 0.2
     * @param array $args
     * @return array
     */
    public function modifiyTagCloud($args)
    {
        $args['largest'] = self::TAG_CLOUD_LARGEST;
        $args['smallest'] = self::TAG_CLOUD_SMALLEST;
        $args['unit'] = self::TAG_CLOUD_UNIT;

        return $args;
    }
}
