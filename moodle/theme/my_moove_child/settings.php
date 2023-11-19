<?php
// This file is part of Ranking block for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Moove block settings file
 *
 * @package    theme_moove
 * @copyright  2017 Willian Mano http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// Include settings specific to your child theme.
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Create a new settings category for your child theme.
    $settings = new admin_settingpage('theme_my_moove_child', get_string('configtitle', 'theme_my_moove_child'));

    // Add settings for your child theme.
    
    // Enable or disable custom front page.
    $name = 'theme_my_moove_child/customfrontpage';
    $title = get_string('customfrontpage', 'theme_my_moove_child');
    $description = get_string('customfrontpagedesc', 'theme_my_moove_child');
    $default = 0; // 0 for disabled, 1 for enabled.
    $settings->add(new admin_setting_configcheckbox($name, $title, $description, $default));

    // Choose the custom front page content.
    $name = 'theme_my_moove_child/frontpagecontent';
    $title = get_string('frontpagecontent', 'theme_my_moove_child');
    $description = get_string('frontpagecontentdesc', 'theme_my_moove_child');
    $default = 'customcontent';
    $choices = array(
        'customcontent' => get_string('customcontent', 'theme_my_moove_child'),
        'defaultcontent' => get_string('defaultcontent', 'theme_my_moove_child'),
    );
    $settings->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    // Enable or disable the display of side-pre content on the front page.
    $name = 'theme_my_moove_child/sidepreonfrontpage';
    $title = get_string('sidepreonfrontpage', 'theme_my_moove_child');
    $description = get_string('sidepreonfrontpagedesc', 'theme_my_moove_child');
    $default = 1; // 0 for disabled, 1 for enabled.
    $settings->add(new admin_setting_configcheckbox($name, $title, $description, $default));

    // Add more settings as needed.

    // Add the settings page to the theme's settings menu.
    $ADMIN->add('themes', $settings);
}
