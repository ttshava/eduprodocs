<?php
// This file is part of Moodle - http://moodle.org/
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'edupro_boost';
$THEME->parents = ['boost'];
$THEME->enable_dock = false;
$THEME->editor_sheets = [];

// SCSS callbacks (defined in lib.php)
$THEME->prescsscallback  = 'theme_edupro_boost_get_pre_scss';
$THEME->extrascsscallback = 'theme_edupro_boost_get_extra_scss';
$THEME->scss = function ($theme) {
    return theme_edupro_boost_get_main_scss_content($theme);
};

// Page layouts — all inherit from Boost; drawers.php is our custom override
$THEME->layouts = [
    'base' => [
        'file'    => 'drawers.php',
        'regions' => [],
    ],
    'standard' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'course' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'coursecategory' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'incourse' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'frontpage' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'admin' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'mydashboard' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'mypublic' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'login' => [
        'file'    => 'login.php',
        'regions' => [],
    ],
    'popup' => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    'frametop' => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true],
    ],
    'embedded' => [
        'file'    => 'embedded.php',
        'regions' => [],
    ],
    'maintenance' => [
        'file'    => 'maintenance.php',
        'regions' => [],
    ],
    'print' => [
        'file'    => 'columns1.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    'redirect' => [
        'file'    => 'embedded.php',
        'regions' => [],
    ],
    'report' => [
        'file'    => 'drawers.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'secure' => [
        'file'    => 'secure.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
];

$THEME->requiredblocks     = '';
$THEME->addblockposition   = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->iconsystem         = '\\core\\output\\icon_system_fontawesome';
$THEME->haseditswitch      = true;
$THEME->usescourseindex    = true;
$THEME->activityheaderconfig = ['notitle' => true];
