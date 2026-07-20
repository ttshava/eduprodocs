<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('theme_edupro_boost', get_string('configtitle', 'theme_boost'));
    $page = new admin_settingpage('theme_edupro_boost_general', get_string('generalsettings', 'theme_edupro_boost'));

    // Preset.
    $name        = 'theme_edupro_boost/preset';
    $title       = get_string('preset', 'theme_edupro_boost');
    $description = get_string('preset_desc', 'theme_edupro_boost');
    $default     = 'default.scss';
    $setting     = new admin_setting_configselect($name, $title, $description, $default, []);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files.
    $name        = 'theme_edupro_boost/presetfiles';
    $title       = get_string('presetfiles', 'theme_edupro_boost');
    $description = get_string('presetfiles_desc', 'theme_edupro_boost');
    $setting     = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0, ['maxfiles' => 20, 'accepted_types' => ['.scss']]);
    $page->add($setting);

    // Raw SCSS pre.
    $name        = 'theme_edupro_boost/scsspre';
    $title       = get_string('rawscsspre', 'theme_edupro_boost');
    $description = get_string('rawscsspre_desc', 'theme_edupro_boost');
    $default     = '';
    $setting     = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS post.
    $name        = 'theme_edupro_boost/scss';
    $title       = get_string('rawscss', 'theme_edupro_boost');
    $description = get_string('rawscss_desc', 'theme_edupro_boost');
    $default     = '';
    $setting     = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
