<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/affilicious-theme.php');

$affiliciousTheme = \Affilicious_Theme::get_instance();
$affiliciousTheme->run();
