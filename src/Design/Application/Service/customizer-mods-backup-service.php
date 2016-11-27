<?php
namespace Affilicious\Theme\Design\Application\Service;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Customizer_Mods_Backup_Service
{
    const OPTION_BACKUP_NAME = 'affilicious_theme_options_design_container_customizer_tab_raw_modifications_field';

    /**
     * @since 0.5
     */
    public function activate()
    {
        $backup = $this->get_theme_mods_backup();
        $this->set_theme_mods($backup);
    }

    /**
     * @since 0.5
     */
    public function store_backup()
    {
        $mods = $this->get_theme_mods();
        $this->set_theme_mods_backup($mods);
    }

    /**
     * @since 0.5
     * @param $option
     */
    public function apply_backup($option)
    {
        if($option == self::OPTION_BACKUP_NAME) {
            $backup = $this->get_theme_mods_backup();
            $this->set_theme_mods($backup);
        }
    }

    /**
     * @since 0.5
     * @param $mods
     */
    public function set_theme_mods($mods)
    {
        $affilicious_theme = wp_get_theme();
        if(empty($affilicious_theme)) {
            return;
        }

        $name = 'theme_mods_' . $affilicious_theme->get_stylesheet();
        if(empty($mods)) {
            delete_option($name);
            return;
        }

        if(!is_array($mods)) {
            $mods = unserialize($mods);
        }

        $updated = update_option($name, $mods);
        if(!$updated) {
            add_option($name, $mods);
        }
    }

    /**
     * Get the theme mods
     *
     * @since 0.6
     * @return null|string
     */
    public function get_theme_mods()
    {
        $affilicious_theme = wp_get_theme();
        if(empty($affilicious_theme)) {
            return null;
        }

        $name = 'theme_mods_' . $affilicious_theme->get_stylesheet();
        $mods = get_option($name);

        if(is_array($mods)) {
            $mods = serialize($mods);
        }

        return $mods;
    }

    /**
     * @since 0.6
     * @param array $mods
     */
    public function set_theme_mods_backup($mods)
    {
        if(empty($mods)) {
            delete_option(self::OPTION_BACKUP_NAME);
            return;
        }

        if(!is_string($mods)) {
            $mods = serialize($mods);
        }

        $updated = update_option(self::OPTION_BACKUP_NAME, $mods);
        if(!$updated) {
            add_option(self::OPTION_BACKUP_NAME, $mods);
        }
    }

    /**
     * @since 0.5
     * @return mixed
     */
    public function get_theme_mods_backup()
    {
        $mods = get_option(self::OPTION_BACKUP_NAME);

        if(is_string($mods)) {
            $mods = unserialize($mods);
        }

        return $mods;
    }
}
