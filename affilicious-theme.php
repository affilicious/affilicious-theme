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
use Pimple\Container;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

define('AFFILICIOUS_THEME_ROOT_PATH', get_template_directory());
define('AFFILICIOUS_THEME_ROOT_URL', get_template_directory_uri());

if(!class_exists('Affilicious_Theme')) {

    final class Affilicious_Theme
    {
        const THEME_NAME = 'affilicious-theme';
        const THEME_VERSION = '0.7';
        const THEME_MIN_PHP_VERSION = '5.6';
        const THEME_MIN_AFFILICIOUS_PLUGIN_VERSION = '0.8';
        const THEME_NAMESPACE = 'Affilicious_Theme\\';
        const THEME_TESTS_NAMESPACE = 'Affilicious_Theme\\Tests\\';
        const THEME_SOURCE_DIR = 'src/';
        const THEME_TESTS_DIR= 'tests/';
        const THEME_STORE_URL = 'https://affilicioustheme.de';
        const THEME_ITEM_NAME= 'Affilicious Theme';
        const THEME_LICENSE_KEY = '42aa4d279329fe829a6022f47e1a47b8';
        const THEME_AUTHOR = 'Affilicious Team';

        /**
         * Stores the singleton instance.
         *
         * @var \Affilicious_Theme
         */
        private static $instance;

        /**
         * A reference to the main plugin.
         *
         * @see https://github.com/affilicious/affilicious
         * @var Affilicious_Plugin
         */
        private $affilicious;

        /**
         * Register all services and parameters for the pimple dependency injection.
         * This container is just a reference to the container of the _affilicious plugin.
         *
         * @see http://pimple.sensiolabs.org
         * @var Container
         */
        private $container;

        /**
         * Get the instance of the affilicious theme.
         *
         * @since 0.3
         * @return Affilicious_Theme
         */
        public static function get_instance()
        {
            if (self::$instance === null) {
                self::$instance = new \Affilicious_Theme();
            }

            return self::$instance;
        }

        /**
         * Get the root path of the affilicious theme.
         *
         * @since 0.2
         * @return string
         */
        public static function get_root_path()
        {
            return AFFILICIOUS_THEME_ROOT_PATH;
        }

        /**
         * Get the root url of the affilicious theme.
         *
         * @since 0.2
         * @return string
         */
        public static function get_root_url()
        {
            return AFFILICIOUS_THEME_ROOT_URL;
        }

        /**
         * Prepare the plugin with for usage with Wordpress and namespaces.
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
         * Make namespaces compatible with the source code of this theme.
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

            $file_path = str_ireplace(self::THEME_NAMESPACE, '', $class) . '.php';
            $file_path = strtolower($file_path);
            $file_path = str_replace('_', '-', $file_path);

            $test_prefix = self::THEME_TESTS_NAMESPACE;
            if (stripos($class, $test_prefix) !== false) {
                $file_path = __DIR__ . '/' . $file_path;
            } else {
                $file_path = __DIR__ . '/' . self::THEME_SOURCE_DIR . $file_path;
            }

            $file_path = str_replace('\\', DIRECTORY_SEPARATOR, $file_path);

            /** @noinspection PhpIncludeInspection */
            include_once($file_path);
        }

        /**
         * Run all of the theme code.
         *
         * @since 0.2
         */
        public function run()
        {
            // Hook the theme activation and deactivation
            add_action('after_switch_theme', array($this, 'activate'));
            add_action('switch_theme', array($this, 'deactivate'));

            // Hook the theme support and textdomain
            add_action('after_setup_theme', array($this, 'load_support'));
            add_action('after_setup_theme', array($this, 'load_textdomain'));

            // Hook the plugin loader
            add_action('tgmpa_register', array($this, 'load_plugins'));

            $this->load_includes();
            $this->load_functions();

            // Load the affilicious plugin and the dependency container
            if(class_exists('\Affilicious_Plugin')) {
                $this->affilicious = \Affilicious_Plugin::get_instance();
                $this->container   = $this->affilicious->get_container();

                $this->load_services();
                $this->load_shortcodes();
                $this->register_public_hooks();
                $this->register_admin_hooks();
            }
        }

        /**
         * Update the theme with the help of the software licensing from Easy Digital Downloads.
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
            // Check the PHP version requirement
            if(!version_compare(phpversion(), self::THEME_MIN_PHP_VERSION, '>=')) {
                switch_theme('');

                $this->load_textdomain();
                wp_die(sprintf(
                    __('The Affilicious Theme requires at least the PHP version %s to reveal the full potential. Please switch the PHP version in your hosting provider.', 'affilicious-theme'),
                    self::THEME_MIN_PHP_VERSION
                ));
            }

            // Apply the backup styles
            $customizer_mods_backup_service = $this->container['affilicious_theme.design.application.service.customizer_mods_backup'];
            if($customizer_mods_backup_service !== null) {
                $customizer_mods_backup_service->activate();
            }

            // Activate the license for the updates
            $license_manager = $this->container['affilicious.common.license.manager'];
            if($license_manager !== null) {
                $license_manager->activate(self::THEME_ITEM_NAME, self::THEME_LICENSE_KEY);
            }
        }

        /**
         * The code that runs during theme deactivation.
         *
         * @since 0.2
         */
        public function deactivate()
        {
            // Deactivate the license for the updates
            $license_manager = $this->container['affilicious.common.license.manager'];
            if($license_manager !== null) {
                $license_manager->deactivate(self::THEME_ITEM_NAME, self::THEME_LICENSE_KEY);
            }
        }

        /**
         * Load the supported theme options.
         *
         * @since 0.2
         */
        public function load_support()
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
            $dir = self::get_root_path() . '/languages';
            load_theme_textdomain(self::THEME_NAME, $dir);
        }

        /**
         * Load the includes.
         *
         * @since 0.3.4
         */
        public function load_includes()
        {
            require_once(__DIR__ . '/affilicious-theme-updater.php');
            require_once(__DIR__ . '/include/customizer-library/customizer-library.php');
            require_once(__DIR__ . '/vendor/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php');
        }

        /**
         * Register the services for the dependency injection.
         *
         * @since 0.3.4
         */
        public function load_services()
        {
            $this->container['affilicious_theme.design.presentation.setup.asset'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Asset_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.shortcode'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Shortcode_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.content'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Content_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.comment'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Comment_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.menu'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Menu_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.sidebar'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Sidebar_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.customizer'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Customizer_Setup();
            };

            $this->container['affilicious_theme.design.presentation.setup.widget'] = function () {
                return new \Affilicious_Theme\Design\Presentation\Setup\Widget_Setup();
            };

            $this->container['affilicious_theme.design.application.options.design'] = function ($c) {
                return new \Affilicious_Theme\Design\Application\Options\Design_Options(
                    $c['affilicious_theme.design.application.service.customizer_mods_backup']
                );
            };

            $this->container['affilicious_theme.design.application.service.customizer_mods_backup'] = function() {
                return new \Affilicious_Theme\Design\Application\Service\Customizer_Mods_Backup_Service();
            };
        }

        /**
         * Load the required plugins for this theme.
         *
         * @since 0.2
         */
        public function load_plugins()
        {
            $plugins = array(
                array(
                    'name'               => 'Affilicious',
                    'slug'               => 'affilicious',
                    'source'             => 'https://github.com/affilicious/affilicious/archive/master.zip',
                    'version'            => self::THEME_MIN_AFFILICIOUS_PLUGIN_VERSION,
                    'required'           => true,
                    //'force_activation'   => true,
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
                'has_notices'  => false,
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
         * Load all required shortcodes.
         *
         * @since 0.3.4
         */
        public function load_shortcodes()
        {
            $shortcode_setup = $this->container['affilicious_theme.design.presentation.setup.shortcode'];
            $shortcode_setup->init();
        }

        /**
         * Load the simple functions for an easier usage in templates.
         *
         * @since 0.2
         */
        public function load_functions()
        {
            require_once(__DIR__ . '/src/functions.php');
        }

        /**
         * Register all of the hooks related to the public-facing functionality.
         *
         * @since 0.2
         */
        public function register_public_hooks()
        {
            // Hook the public styles and scripts
            $asset_setup = $this->container['affilicious_theme.design.presentation.setup.asset'];
            add_action('wp_enqueue_scripts', array($asset_setup, 'add_public_styles'));
            add_action('wp_enqueue_scripts', array($asset_setup, 'add_public_scripts'));

            // Hook the sidebars
            $sidebar_setup = $this->container['affilicious_theme.design.presentation.setup.sidebar'];
            add_action('init', array($sidebar_setup, 'init'));
            add_filter('dynamic_sidebar_params', array($sidebar_setup, 'modify_sidebar_params'));

            // Hook the widgets
            $widget_setup = $this->container['affilicious_theme.design.presentation.setup.widget'];
            add_filter('widgets_init', array($widget_setup, 'register_widgets'));
            add_filter('widget_tag_cloud_args', array($widget_setup, 'modifiy_tag_cloud'));

            // Hook the menus
            $menu_setup = $this->container['affilicious_theme.design.presentation.setup.menu'];
            add_action('after_setup_theme', array($menu_setup, 'init'));

            // Hook the content
            $content_setup = $this->container['affilicious_theme.design.presentation.setup.content'];
            add_filter('the_content', array($content_setup, 'set_table_class'));
            add_filter('excerpt_length', array($content_setup, 'set_excerpt_length'));
            add_filter('post_thumbnail_html', array($content_setup, 'remove_img_dimensions'));
            add_filter('the_content', array($content_setup, 'remove_img_dimensions'));
            add_filter('get_avatar', array($content_setup, 'remove_img_dimensions'));
            add_filter('the_content', array($content_setup, 'wrap_fluid_media'));

            // Hook the comments
            $comment_setup = $this->container['affilicious_theme.design.presentation.setup.comment'];
            add_filter('comment_form_default_fields', array($comment_setup, 'set_form_default_fields'));
            add_filter('comment_form_defaults', array($comment_setup, 'set_form_defaults'));
            add_filter('after_setup_theme', array($comment_setup, 'set_theme_support'));

            // Hook the theme customizer
            $customizer_setup = $this->container['affilicious_theme.design.presentation.setup.customizer'];
            add_action('init', array($customizer_setup, 'init'), 100);
            add_action('init', array($customizer_setup, 'render'), 102);
            add_action('wp_enqueue_scripts', array($customizer_setup, 'enqueue_scripts'));
            add_action('wp_head', array($customizer_setup, 'head'));
        }

        /**
         * Register all of the hooks related to the admin area functionality.
         *
         * @since 0.2
         */
        public function register_admin_hooks()
        {
            // Hook the updater
            add_action('admin_init', array($this, 'update'), 0);

            // Hook the mods backup
            $customizer_mods_backup_service = $this->container['affilicious_theme.design.application.service.customizer_mods_backup'];
            add_action('customize_save_after', array($customizer_mods_backup_service, 'store_backup'), 99);
            add_action('added_option', array($customizer_mods_backup_service, 'apply_backup'), 999, 1);
            add_action('updated_option', array($customizer_mods_backup_service, 'apply_backup'), 999, 1);

            // Hook the admin and theme customizer styles and scripts
            $asset_setup = $this->container['affilicious_theme.design.presentation.setup.asset'];
            add_action('admin_enqueue_scripts', array($asset_setup, 'add_admin_styles'));
            add_action('admin_enqueue_scripts', array($asset_setup, 'add_admin_scripts'));
            add_action('customize_preview_init', array($asset_setup, 'add_customizer_scripts'));

            // Hook the design options
            $design_options = $this->container['affilicious_theme.design.application.options.design'];
            add_action('init', array($design_options, 'render'), 100);
            add_action('init', array($design_options, 'apply'), 101);
        }

        /**
         * Get the dependency injection container.
         *
         * @since 0.3.4
         * @return Container
         */
        public function get_container()
        {
            return $this->container;
        }
    }

}
