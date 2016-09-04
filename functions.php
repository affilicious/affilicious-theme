<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/affilicious-theme.php');

$affiliciousTheme = \AffiliciousTheme::getInstance();
$affiliciousTheme->run();
