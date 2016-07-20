<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

define('PROJEKT_AFFILIATE_THEME_ROOT', TEMPLATEPATH);
define('PROJEKT_AFFILIATE_THEME_INCLUDE', PROJEKT_AFFILIATE_THEME_ROOT . '/include');
define('PROJEKT_AFFILIATE_THEME_ASSETS', PROJEKT_AFFILIATE_THEME_ROOT . '/assets');
define('PROJEKT_AFFILIATE_THEME_ADMIN', PROJEKT_AFFILIATE_THEME_INCLUDE . '/admin');
define('PROJEKT_AFFILIATE_THEME_CUSTOMIZER', PROJEKT_AFFILIATE_THEME_ADMIN . '/customizer');
define('PROJEKT_AFFILIATE_THEME_META_BOX', PROJEKT_AFFILIATE_THEME_ADMIN . '/meta-box');
define('PROJEKT_AFFILIATE_THEME_PRODUCT', PROJEKT_AFFILIATE_THEME_INCLUDE . '/product');
define('PROJEKT_AFFILIATE_THEME_AUXILIARY', PROJEKT_AFFILIATE_THEME_INCLUDE . '/auxiliary');
define('PROJEKT_AFFILIATE_THEME_WALKER', PROJEKT_AFFILIATE_THEME_INCLUDE . '/walker');

require_once(PROJEKT_AFFILIATE_THEME_AUXILIARY . '/_load.php');
require_once(PROJEKT_AFFILIATE_THEME_PRODUCT . '/_load.php');
require_once(PROJEKT_AFFILIATE_THEME_WALKER . '/_load.php');
require_once(PROJEKT_AFFILIATE_THEME_CUSTOMIZER . '/_load.php');
require_once(PROJEKT_AFFILIATE_THEME_META_BOX . '/_load.php');

function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );