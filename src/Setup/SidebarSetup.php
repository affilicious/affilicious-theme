<?php
namespace Affilicious\Theme\Setup;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class SidebarSetup
{
    /**
     * Register the main sidebar
     *
     * @since 0.2
     */
    public function registerMainSidebar()
    {
        register_sidebar(array(
            'name' => 'main-sidebar',
            'id' => __('Main Sidebar', 'affilicious-theme'),
            'description' => __('Place your widgets into this sidebar, which is visible on every page.', 'affilicious-theme'),
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '<li class="widget">',
            'after_widget' => '</li>',
        ));
    }
}
