<?php
namespace Affilicious\Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class MainSidebar implements SidebarInterface
{
    const ID = 'main-sidebar';

    /**
     * @inheritdoc
     */
    public function init()
    {
        register_sidebar(array(
            'name' => __('Main Sidebar', 'affilicious-theme'),
            'id' => self::ID,
            'description' => __('Place your widgets into this sidebar, which is visible on every page.', 'affilicious-theme'),
            'before_widget' => '<li><div class="panel panel-default">',
            'after_widget' => '</div></li>',
            'before_title' => '<div class="panel-heading"><h4>',
            'after_title' => '</h4></div>',
        ));
    }
}
