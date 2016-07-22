<?php
namespace ProjektAffiliateTheme\Auxiliary;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class Content
{
    function __construct()
    {
        add_filter('the_content', array($this, 'appendClasses'));
    }

    function appendClasses($content)
    {
        return str_replace('<table>', '<table class="table table-bordered table-striped">', $content);
    }
}

new Content();
