<?php
namespace ProjektAffiliateTheme\Auxiliary;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ThemeSupport
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'addSupport'));
    }

    public function addSupport()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }
}

new ThemeSupport();
