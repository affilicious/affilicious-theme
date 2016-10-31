<?php
namespace Affilicious\Theme\Design\Application\Service;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class CustomizerModsBackupService
{
    const OPTION_BACKUP_NAME = 'affilicious_theme_settings_design_container_customizer_tab_raw_modifications_field';



    public function store_backup()
    {
        $mods = $this->get_theme_mods();
        $this->set_theme_mods_backup($mods);
    }

    public function apply_backup($option)
    {
        if($option == self::OPTION_BACKUP_NAME) {
            $backup = $this->get_theme_mods_backup();
            $this->set_theme_mods($backup);
        }
    }

    public function set_theme_mods($mods)
    {
        $affilicious_theme = wp_get_theme();
        if(empty($affilicious_theme)) {
            return null;
        }

        $name = 'theme_mods_' . $affilicious_theme->get_stylesheet();

        if(empty($mods)) {
            delete_option($name);
            return;
        }

        $mods = unserialize($mods);
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
        $mods = serialize($mods);

        return $mods;
    }

    public function set_theme_mods_backup($mods)
    {
        if(empty($mods)) {
            delete_option(self::OPTION_BACKUP_NAME);
            return;
        }

        $updated = update_option(self::OPTION_BACKUP_NAME, $mods);
        if($updated) {
            add_option(self::OPTION_BACKUP_NAME, $mods);
        }
    }

    public function get_theme_mods_backup()
    {
        $mods = carbon_get_theme_option(self::OPTION_BACKUP_NAME);

        return $mods;
    }
}
