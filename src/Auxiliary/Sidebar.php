<?php
namespace ProjektAffiliateTheme\Auxiliary;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Sidebar
{
    const WIDGET_TAG_CLOUD_SMALLEST = 160;
    const WIDGET_TAG_CLOUD_LARGEST = 160;
    const WIDGET_TAG_CLOUD_UNIT = '%';

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @param string $id
     * @param string $name
     * @param string $description
     */
    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;

        add_action('widgets_init', array($this, 'register'));
        add_filter('widget_tag_cloud_args', 'ap_widget_tag_cloud_args');
    }

    /**
     * Register the new sidebar in Wordpress
     */
    public function register()
    {
        register_sidebar(array(
            'name' => $this->name,
            'id' => $this->id,
            'description' => $this->description,
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '<li class="widget">',
            'after_widget' => '</li>',
        ));
    }

    /**
     * Modify the widget tag cloud
     * @param array $args
     * @return array
     */
    public function modifiyTagCloud($args)
    {
        $args['largest'] = 160;
        $args['smallest'] = 80;
        $args['unit'] = '%';
        return $args;
    }
}


