<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class AP_Tables
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

$ap_tables = new AP_Tables();
