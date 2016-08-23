<?php
namespace Affilicious\Theme\Sidebar;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

interface SidebarInterface
{
    /**
     * Initialize the sidebar in Wordpress
     *
     * @see https://codex.wordpress.org/Function_Reference/register_sidebar
     * @since 0.4
     */
    public function init();
}
