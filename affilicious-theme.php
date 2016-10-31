<?php
/**
 * Affilicious Theme
 * Copyright (C) 2016, Affilicious Theme - support@affilicioustheme.de
 *
 * Affilicious Theme is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Affilicious Theme is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Affilicious Theme. If not, see <http://www.gnu.org/licenses/>.
 */
use Affilicious\Theme\Common\Application\Setup\AssetSetup;
use Affilicious\Theme\Design\Application\Setup\ContentSetup;
use Affilicious\Theme\Design\Application\Setup\MenuSetup;
use Affilicious\Theme\Design\Application\Setup\SidebarSetup;
use Affilicious\Theme\Design\Application\Setup\WidgetSetup;
use Affilicious\Theme\Design\Domain\Shortcode\AlertShortcode;
use Affilicious\Theme\Design\Application\Setup\CommentSetup;
use Affilicious\Theme\Design\Application\Setup\CustomizerSetup;
use Affilicious\Theme\Settings\Application\Setting\DesignSettings;
use Affilicious\Theme\Design\Application\Filter\CustomSidebarFilter;
use Pimple\Container;

if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AffiliciousTheme
{
    const THEME_NAME = 'affilicious-theme';
    const THEME_VERSION = '0.4.3';
    const THEME_NAMESPACE = 'Affilicious\\Theme\\';
    const THEME_STORE_URL = 'http://affilicioustheme.de';
    const THEME_ITEM_NAME = 'Affilicious Theme';
    const THEME_LICENSE_KEY = '42aa4d279329fe829a6022f47e1a47b8';
    const THEME_AUTHOR = 'Affilicious Team';

	/**
	 * Stores the singleton instance
	 *
	 * @var \AffiliciousTheme
	 */
	private static $instance;

	/**
	 * A reference to the main plugin
	 *
	 * @see https://github.com/AlexBa/affilicious
	 * @var Affilicious_Plugin
	 */
	private $affilicious;

	/**
	 * Register all services and parameters for the pimple dependency injection.
	 * This container is just a reference to the container of the Affilicious plugin.
	 *
	 * @see http://pimple.sensiolabs.org
	 * @var Container
	 */
	private $container;

	/**
	 * Get the instance of the affilicious theme
	 *
	 * @since 0.3
	 * @return AffiliciousTheme
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new \AffiliciousTheme();
		}

		return self::$instance;
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
     * Prepare the plugin with for usage with Wordpress and namespaces
     *
     * @since 0.2
     */
    public function __construct()
    {
        if (file_exists(__DIR__ . '/vendor/autoload.php')) {
            require(__DIR__ . '/vendor/autoload.php');
        }

        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Make namespaces compatible with the source code of this theme
     *
     * @since 0.2
     * @param string $class
     */
    public function autoload($class)
    {
        $prefix = self::THEME_NAMESPACE;
        if (stripos($class, $prefix) === false) {
            return;
        }
        $file_path = __DIR__ . '/src/' . str_ireplace(self::THEME_NAMESPACE, '', $class) . '.php';
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
	    // Hook the theme activation and deactivation
	    add_action('after_switch_theme', array($this, 'activate'));
	    add_action('switch_theme', array($this, 'deactivate'));

	    // Hook the theme support and textdomain
	    add_action('after_setup_theme', array($this, 'loadSupport'));
	    add_action('after_setup_theme', array($this, 'load_textdomain'));

	    // Hook the plugin loader
	    add_action('tgmpa_register', array($this, 'loadPlugins'));

	    $this->loadIncludes();
	    $this->loadFunctions();

	    // Load the affilicious plugin and the dependency container
	    if(class_exists('\Affilicious_Plugin')) {
		    $this->affilicious = \Affilicious_Plugin::get_instance();
		    $this->container   = $this->affilicious->get_container();

		    $this->loadServices();
		    $this->loadShortcodes();
		    $this->registerPublicHooks();
		    $this->registerAdminHooks();
	    }
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
	    // Apply the backup styles
        $customizerModsBackupService = $this->container['affilicious.theme.design.application.service.customizer_mods_backup'];
        $customizerModsBackupService->activate();

		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => self::THEME_LICENSE_KEY,
			'item_name'  => urlencode(self::THEME_ITEM_NAME)
		);

		$response = wp_remote_post(self::THEME_STORE_URL, array(
			'timeout' => 15,
			'sslverify' => false,
			'body' => $api_params
		));

		return is_wp_error($response);
	}

	/**
	 * The code that runs during theme deactivation.
	 *
	 * @since 0.2
	 */
	public function deactivate()
	{
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => self::THEME_LICENSE_KEY,
			'item_name'  => urlencode(self::THEME_ITEM_NAME)
		);

		$response = wp_remote_post(self::THEME_STORE_URL, array(
			'timeout' => 15,
			'sslverify' => false,
			'body' => $api_params
		));

		return is_wp_error($response);
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
	public function load_textdomain()
	{
		$dir = self::getRootDir() . '/languages';
		load_theme_textdomain(self::THEME_NAME, $dir);
	}

	/**
	 * Load the includes
	 *
	 * @since 0.3.4
	 */
    public function loadIncludes()
    {
	    require_once(__DIR__ . '/affilicious-theme-updater.php');
	    require_once(__DIR__ . '/include/customizer-library/customizer-library.php');
	    require_once(__DIR__ . '/vendor/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php');
    }

	/**
	 * Register the services for the dependency injection
	 *
	 * @since 0.3.4
	 */
	public function loadServices()
	{
		$this->container['affilicious.theme.common.setup.asset'] = function () {
			return new AssetSetup();
		};

		$this->container['affilicious.theme.design.setup.content'] = function () {
			return new ContentSetup();
		};

		$this->container['affilicious.theme.design.setup.comment'] = function () {
			return new CommentSetup();
		};

		$this->container['affilicious.theme.design.setup.menu'] = function () {
			return new MenuSetup();
		};

		$this->container['affilicious.theme.design.setup.sidebar'] = function () {
			return new SidebarSetup();
		};

		$this->container['affilicious.theme.design.setup.customizer'] = function () {
			return new CustomizerSetup();
		};

		$this->container['affilicious.theme.design.setup.widget'] = function () {
			return new WidgetSetup();
		};

		$this->container['affilicious.theme.settings.setting.design'] = function ($c) {
			return new DesignSettings($c['affilicious.theme.design.application.service.customizer_mods_backup']);
		};

		$this->container['affilicious.theme.design.filter.custom_sidebar'] = function() {
		    return new CustomSidebarFilter();
        };

        $this->container['affilicious.theme.design.application.service.customizer_mods_backup'] = function() {
            return new \Affilicious\Theme\Design\Application\Service\CustomizerModsBackupService();
        };
	}

    /**
     * Load the required plugins for this theme.
     *
     * @since 0.2
     */
    public function loadPlugins()
    {
        $plugins = array(
            array(
                'name'               => 'Affilicious',
                'slug'               => 'affilicious',
                'source'             => 'https://github.com/AlexBa/affilicious/archive/master.zip',
	            'version'            => '0.5.2',
                'required'           => true,
            ),
            array(
                'name'        => 'WordPress SEO by Yoast',
                'slug'        => 'wordpress-seo',
                'is_callable' => 'wpseo_init',
                'required'    => false,
            ),
        );

        $config = array(
            'id'           => 'tgmpa',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'parent_slug'  => 'themes.php',
            'capability'   => 'edit_theme_options',
            'has_notices'  => true,
            'dismissable'  => true,
            'strings'      => array(
                'page_title'                      => __('Install Required Plugins', 'affilicious-theme'),
                'menu_title'                      => __('Install Plugins', 'affilicious-theme'),
                'installing'                      => __('Installing Plugin: %s', 'affilicious-theme'),
                'updating'                        => __('Updating Plugin: %s', 'affilicious-theme'),
                'oops'                            => __('Something went wrong with the plugin API.', 'affilicious-theme'),
                'notice_can_install_required'     => _n_noop(
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'affilicious-theme'
                ),
                'notice_can_install_recommended'  => _n_noop(
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'affilicious-theme'
                ),
                'notice_ask_to_update'            => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'affilicious-theme'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'affilicious-theme'
                ),
                'notice_can_activate_required'    => _n_noop(
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'affilicious-theme'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'affilicious-theme'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'affilicious-theme'
                ),
                'update_link' 					  => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'affilicious-theme'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'affilicious-theme'
                ),
                'return'                          => __('Return to Required Plugins Installer', 'affilicious-theme'),
                'plugin_activated'                => __('Plugin activated successfully.', 'affilicious-theme'),
                'activated_successfully'          => __('The following plugin was activated successfully:', 'affilicious-theme'),
                'plugin_already_active'           => __('No action taken. Plugin %1$s was already active.', 'affilicious-theme'),
                'plugin_needs_higher_version'     => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'affilicious-theme'),
                'complete'                        => __('All plugins installed and activated successfully. %1$s', 'affilicious-theme'),
                'dismiss'                         => __('Dismiss this notice', 'affilicious-theme'),
                'notice_cannot_install_activate'  => __('There are one or more required or recommended plugins to install, update or activate.', 'affilicious-theme'),
                'contact_admin'                   => __('Please contact the administrator of this site for help.', 'affilicious-theme'),
            ),
        );

        tgmpa($plugins, $config);
    }

	/**
	 * Load all required shortcodes
	 *
	 * @since 0.3.4
	 */
    public function loadShortcodes()
    {
    	$alertShortcode = new AlertShortcode();
    	add_shortcode($alertShortcode->getName(), array($alertShortcode, 'render'));
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
	    // Hook the public styles and scripts
	    $assetSetup = $this->container['affilicious.theme.common.setup.asset'];
	    add_action('wp_enqueue_scripts', array($assetSetup, 'addPublicStyles'));
	    add_action('wp_enqueue_scripts', array($assetSetup, 'addPublicScripts'));

	    // Hook the sidebars
	    $sidebarSetup = $this->container['affilicious.theme.design.setup.sidebar'];
	    add_action('init', array($sidebarSetup, 'init'));
        add_filter('affilicious_product_render_affilicious_product_container_general_fields', array($sidebarSetup, 'render'), 0);

	    // Hook the widgets
	    $widgetSetup = $this->container['affilicious.theme.design.setup.widget'];
	    add_filter('widgets_init', array($widgetSetup, 'registerWidgets'));
	    add_filter('widget_tag_cloud_args', array($widgetSetup, 'modifiyTagCloud'));

	    // Hook the menus
	    $menuSetup = $this->container['affilicious.theme.design.setup.menu'];
	    add_action('after_setup_theme', array($menuSetup, 'init'));

	    // Hook the content
	    $contentSetup = $this->container['affilicious.theme.design.setup.content'];
	    add_filter('the_content', array($contentSetup, 'setTableClass'));
	    add_filter('excerpt_length', array($contentSetup, 'setExcerptLength'));
	    add_filter('post_thumbnail_html', array($contentSetup, 'removeImgDimensions'));
	    add_filter('the_content', array($contentSetup, 'removeImgDimensions'));
	    add_filter('get_avatar', array($contentSetup, 'removeImgDimensions'));
	    add_filter('the_content', array($contentSetup, 'wrapFluidMedia'));

	    // Hook the comments
	    $commentSetup = $this->container['affilicious.theme.design.setup.comment'];
	    add_filter('comment_form_default_fields', array($commentSetup, 'setFormDefaultFields'));
	    add_filter('comment_form_defaults', array($commentSetup, 'setFormDefaults'));
	    add_filter('after_setup_theme', array($commentSetup, 'setThemeSupport'));

	    // Theme Customizer
	    $customizerSetup = $this->container['affilicious.theme.design.setup.customizer'];
	    add_action('init', array($customizerSetup, 'init'), 100);
	    add_action('init', array($customizerSetup, 'render'), 102);
	    add_action('wp_enqueue_scripts', array($customizerSetup, 'enqueueScripts'));
	    add_action('wp_head', array($customizerSetup, 'head'));

        $customSidebarFilter = $this->container['affilicious.theme.design.filter.custom_sidebar'];
        add_filter('dynamic_sidebar_params', array($customSidebarFilter, 'filter'));
    }

    /**
     * Register all of the hooks related to the admin area functionality
     *
     * @since 0.2
     */
    public function registerAdminHooks()
    {
        // Hook the mods backup
        $customizerModsBackupService = $this->container['affilicious.theme.design.application.service.customizer_mods_backup'];
        add_action('customize_save_after', array($customizerModsBackupService, 'store_backup'), 99);
        add_action('added_option', array($customizerModsBackupService, 'apply_backup'), 999, 1);
        add_action('updated_option', array($customizerModsBackupService, 'apply_backup'), 999, 1);

    	// Hook the updater
	    add_action('admin_init', array($this, 'update'), 0);

        // Hook the admin styles and scripts
	    $assetSetup = $this->container['affilicious.theme.common.setup.asset'];
        add_action('admin_enqueue_scripts', array($assetSetup, 'addAdminStyles'));
        add_action('admin_enqueue_scripts', array($assetSetup, 'addAdminScripts'));
	    add_action('customize_preview_init', array($assetSetup, 'addCustomizerScripts'));

	    // Hook the sidebars
	    $sidebarSetup = $this->container['affilicious.theme.design.setup.sidebar'];
	    add_action('admin_init', array($sidebarSetup, 'setDefaultSidebar'), 0);

	    // Hook the settings
	    $designSettings = $this->container['affilicious.theme.settings.setting.design'];
	    add_action('init', array($designSettings, 'render'), 100);
	    add_action('init', array($designSettings, 'apply'), 101);
    }

	/**
	 * @since 0.3.4
	 * @return Container
	 */
	public function getContainer()
	{
		return $this->container;
	}
}
