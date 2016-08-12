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
            'name' => __('Main Sidebar', 'affilicious-theme'),
            'id' => 'main-sidebar',
            'description' => __('Place your widgets into this sidebar, which is visible on every page.', 'affilicious-theme'),
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '<li class="widget">',
            'after_widget' => '</li>',
        ));
    }

    /**
     * Register the product sidebar
     *
     * @since 0.2
     */
    public function registerProductSidebar()
    {
        register_sidebar(array(
            'name' => __('Product Sidebar', 'affilicious-theme'),
            'id' => 'product-sidebar',
            'description' => __('Place your widgets into this sidebar, which is visible on every product page.', 'affilicious-theme'),
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '<li class="widget">',
            'after_widget' => '</li>',
        ));
    }
}
