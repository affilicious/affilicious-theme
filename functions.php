<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/vendor/autoload.php');

use ProjektAffiliateTheme\Admin\Customizer\ThemeCustomizerManager;
use ProjektAffiliateTheme\Admin\MetaBox\MetaBoxManager;
use ProjektAffiliateTheme\Auxiliary\Assets;
use ProjektAffiliateTheme\Auxiliary\Content;
use ProjektAffiliateTheme\Auxiliary\Layout;
use ProjektAffiliateTheme\Auxiliary\Sidebar;
use ProjektAffiliateTheme\Auxiliary\ThemeSupport;
use ProjektAffiliateTheme\Auxiliary\WPGitHubThemeUpdater;
use ProjektAffiliateTheme\Walker\BootstrapWalker;


new Layout();
new WPGitHubThemeUpdater();
new MetaBoxManager();
new Assets();
new Content();
new ThemeSupport();
new ThemeCustomizerManager();
new \ProjektAffiliateTheme\Auxiliary\Assets();
new Sidebar(
    'main-sidebar',
    __('Sidebar', 'projektaffiliatetheme'),
    __('Place your widgets into this sidebar. It is visible on every page.', 'projektaffiliatetheme')
);


if ( ! function_exists( 'is_version' ) ) {
    function is_version( $version ) {
        global $wp_version;

        if ( version_compare( $wp_version, $version, '>=' ) ) {
            return false;
        }
        return true;
    }
}

function ap_is_loose_layout()
{
    return Layout::isLoose();
}

function ap_is_tight_layout()
{
    return Layout::isTight();
}

function ap_has_main_navigation()
{
    return has_nav_menu('top-menu');
}

function ap_main_navigation()
{
    wp_nav_menu(array(
        'menu_id' => 'nav-top-menu',
        'theme_location' => 'top-menu',
        'depth' => 2,
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'top-menu',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new BootstrapWalker()
    ));
}

function ap_has_bottom_navigation()
{
    return has_nav_menu('bottom-menu');
}

function ap_bottom_navigation()
{
    wp_nav_menu(array(
        'menu' => 'footer_links',
        'theme_location' => 'bottom-menu',
        'depth' => 2,
        'container' => 'nav',
        'container_class' => 'navbar-collapse',
        'container_id' => 'bottom-menu',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new BootstrapWalker()
    ));
}

function ap_has_logo()
{
    $logo = get_theme_mod('ap_general_logo');
    return $logo != null;
}

function ap_get_logo()
{
    return get_theme_mod('ap_general_logo');
}

function ap_logo()
{
    echo ap_get_logo();
}

function ap_has_logo_retina()
{
    $logo = get_theme_mod('ap_general_logo_retina');
    return $logo != null;
}

function ap_get_logo_retina()
{
    return get_theme_mod('ap_general_logo_retina');
}

function ap_logo_retina()
{
    echo ap_get_logo_retina();
}


// Register Top Menu
add_action('after_setup_theme', 'ap_register_menu');
function ap_register_menu()
{
    register_nav_menu('top-menu', 'Obere Navigation');
    register_nav_menu('bottom-menu', 'Untere Navigation');
}

function custom_excerpt_length($length)
{
    return 30;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);


