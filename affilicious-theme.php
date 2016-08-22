<?php
use Affilicious\Theme\Admin\Customizer\ThemeCustomizerManager;
use Affilicious\Theme\Setup\AssetSetup;
use Affilicious\Theme\Setup\ContentSetup;
use Affilicious\Theme\Setup\MenuSetup;
use Affilicious\Theme\Setup\SidebarSetup;
use Affilicious\Theme\Setup\WidgetSetup;

if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AffiliciousTheme
{
    const THEME_NAME = 'affilicious-theme';
    const THEME_VERSION = '0.2';
    const THEME_NAMESPACE = 'Affilicious\\Theme\\';
    const THEME_STORE_URL = 'http://affilicioustheme.de';
    const THEME_ITEM_NAME = 'Affilicious Theme';
    const THEME_LICENSE_KEY = 'e90a6d1a115da24a292fe0300afc402a';
    const THEME_AUTHOR = 'Affilicious Team';

    /**
     * Set up the public and admin styles and scripts
     *
     * @var AssetSetup
     */
    private $assetSetup;

    /**
     * Set up the content
     *
     * @var ContentSetup
     */
    private $contentSetup;

    /**
     * Set up the sidebars
     *
     * @var SidebarSetup
     */
    private $sidebarSetup;

    /**
     * Set up the widgets
     *
     * @var WidgetSetup
     */
    private $widgetSetup;

    /**
     * Set up the menus
     *
     * @var MenuSetup
     */
    private $menuSetup;

    /**
     * Prepare the plugin with for usage with Wordpress and namespaces
     *
     * @since 0.2
     */
    public function __construct()
    {
        if (file_exists(__DIR__ . '/vendor/autoload.php')) {
            require(__DIR__ . '/vendor/autoload.php');
        } else {
            spl_autoload_register(array($this, 'autoload'));
        }

        require(__DIR__ . '/vendor/customizer-library/customizer-library.php');

        $this->assetSetup = new AssetSetup();
        $this->contentSetup = new ContentSetup();
        $this->sidebarSetup = new SidebarSetup();
        $this->widgetSetup = new WidgetSetup();
        $this->menuSetup = new MenuSetup();
        new ThemeCustomizerManager();

        add_action('admin_init', array($this, 'update'), 0);
    }

    /**
     * Get the root dir of the affilicious theme
     *
     * @since 0.2
     * @return string
     */
    public static function getRootDir()
    {
        return get_template_directory();
    }

    /**
     * Get the root url of the affilicious theme
     *
     * @since 0.2
     * @return string
     */
    public static function getRootUrl()
    {
        return get_template_directory_uri();
    }

    /**
     * Make namespaces compatible with the source code of this theme
     *
     * @since 0.2
     * @param string $class
     */
    public function autoload($class)
    {
        $prefix = 'Affilicious';
        if (stripos($class, $prefix) === false) {
            return;
        }
        $file_path = __DIR__ . '/src' . str_ireplace(self::THEME_NAMESPACE, '', $class) . '.php';
        $file_path = str_replace('\\', DIRECTORY_SEPARATOR, $file_path);
        include_once($file_path);
    }

    /**
     * Run all of the theme code
     *
     * @since 0.2
     */
    public function run()
    {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        $this->loadUpdater();
        $this->loadFunctions();
        $this->registerPublicHooks();
        $this->registerAdminHooks();
    }

    /**
     * Load the theme updater
     *
     * @since 0.2
     */
    public function loadUpdater()
    {
        include(dirname(__FILE__) . '/affilicious-theme-updater.php');
    }

    /**
     * Load the simple functions for an easier usage in templates
     *
     * @since 0.2
     */
    public function loadFunctions()
    {
        require_once(__DIR__ . '/src/functions.php');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     *
     * @since 0.2
     */
    public function registerPublicHooks()
    {
        // Load the theme support and textdomain
        add_action('after_setup_theme', array($this, 'loadSupport'));
        add_action('after_setup_theme', array($this, 'loadTextdomain'));

        // Load the sidebars, widgets and menus
        add_filter('widgets_init', array($this->widgetSetup, 'registerWidgets'));
        add_filter('widget_tag_cloud_args', array($this->widgetSetup, 'modifiyTagCloud'));
        add_action('after_setup_theme', array($this->menuSetup, 'registerMainMenu'));
        add_action('after_setup_theme', array($this->menuSetup, 'registerBottomMenu'));

        // Modifiy the content
        add_filter('the_content', array($this->contentSetup, 'setTableClass'));
        add_filter('excerpt_length', array($this->contentSetup, 'setExcerptLength'));
        add_filter('body_class', array($this->contentSetup, 'setBodyClass'));

        // Register public styles and scripts
        add_action('wp_enqueue_scripts', array($this->assetSetup, 'addPublicStyles'), 10);
        add_action('wp_enqueue_scripts', array($this->assetSetup, 'addPublicScripts'), 20);
    }

    /**
     * Register all of the hooks related to the admin area functionality
     *
     * @since 0.2
     */
    public function registerAdminHooks()
    {
        // Register admin styles and scripts
        add_action('admin_enqueue_scripts', array($this->assetSetup, 'addAdminStyles'), 30);
        add_action('admin_enqueue_scripts', array($this->assetSetup, 'addAdminScripts'), 40);
    }

    /**
     * Update the theme with the help of the Software Licensing for Easy Digital Downloads
     *
     * @since 0.2
     * @see https://easydigitaldownloads.com/downloads/software-licensing/
     */
    public function update()
    {
        $strings = array(
            'theme-license'             => __( 'Theme License', 'affilicious-theme' ),
            'enter-key'                 => __( 'Enter your theme license key.', 'affilicious-theme' ),
            'license-key'               => __( 'License Key', 'affilicious-theme' ),
            'license-action'            => __( 'License Action', 'affilicious-theme' ),
            'deactivate-license'        => __( 'Deactivate License', 'affilicious-theme' ),
            'activate-license'          => __( 'Activate License', 'affilicious-theme' ),
            'status-unknown'            => __( 'License status is unknown.', 'affilicious-theme' ),
            'renew'                     => __( 'Renew?', 'affilicious-theme' ),
            'unlimited'                 => __( 'unlimited', 'affilicious-theme' ),
            'license-key-is-active'     => __( 'License key is active.', 'affilicious-theme' ),
            'expires%s'                 => __( 'Expires %s.', 'affilicious-theme' ),
            '%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'affilicious-theme' ),
            'license-key-expired-%s'    => __( 'License key expired %s.', 'affilicious-theme' ),
            'license-key-expired'       => __( 'License key has expired.', 'affilicious-theme' ),
            'license-keys-do-not-match' => __( 'License keys do not match.', 'affilicious-theme' ),
            'license-is-inactive'       => __( 'License is inactive.', 'affilicious-theme' ),
            'license-key-is-disabled'   => __( 'License key is disabled.', 'affilicious-theme' ),
            'site-is-inactive'          => __( 'Site is inactive.', 'affilicious-theme' ),
            'license-status-unknown'    => __( 'License status is unknown.', 'affilicious-theme' ),
            'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'affilicious-theme' ),
            'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>Update now</a>.', 'affilicious-theme' ),
        );

        new EDD_Theme_Updater(
            array(
                'remote_api_url' 	=> self::THEME_STORE_URL,
                'version' 			=> self::THEME_VERSION,
                'license' 			=> self::THEME_LICENSE_KEY,
                'item_name' 		=> self::THEME_ITEM_NAME,
                'author'			=> self::THEME_AUTHOR
            ),
            $strings
        );
    }

    /**
     * The code that runs during theme activation.
     *
     * @since 0.2
     */
    public function activate()
    {
        // Nothing to do here
    }

    /**
     * The code that runs during theme deactivation.
     *
     * @since 0.2
     */
    public function deactivate()
    {
        // Nothing to do here
    }

    /**
     * Load the supported theme options
     *
     * @since 0.2
     */
    public function loadSupport()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }

    /**
     * Load the theme textdomain for internationalization.
     *
     * @since 0.2
     */
    public function loadTextdomain()
    {
        $dir = self::getRootDir() . '/languages';
        load_theme_textdomain(self::THEME_NAME, $dir);
    }
}
