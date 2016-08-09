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

        $this->assetSetup = new AssetSetup();
        $this->contentSetup = new ContentSetup();
        $this->sidebarSetup = new SidebarSetup();
        $this->widgetSetup = new WidgetSetup();
        $this->menuSetup = new MenuSetup();
        new ThemeCustomizerManager();
    }

    /**
     * Get the root dir of the affilicious theme
     *
     * @since 0.2
     * @return string
     */
    public static function getRootDir()
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
        add_action('widgets_init', array($this->sidebarSetup, 'registerMainSidebar'));
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
        //TODO: Add the code for updates
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
        $dir = basename(dirname(__FILE__)) . '/languages';
        load_theme_textdomain(self::THEME_NAME, $dir);
    }
}
