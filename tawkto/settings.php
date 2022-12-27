<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin administration pages are defined here.
 *
 * @package     local_tawkto
 * @category    admin
 * @copyright   2022 Stefan Schoch <mail@stefan-schoch.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) { // needs this condition or there is error on login page

    $ADMIN->add('localplugins', new admin_category('local_tawkto_category', get_string('pluginname', 'local_tawkto')));

    $settings = new admin_settingpage('local_tawkto', get_string('settings_title', 'local_tawkto'));
    $ADMIN->add('local_tawkto_category', $settings);

	// debug?
    $settings->add(new admin_setting_configcheckbox('local_tawkto/debug',
        get_string('setting_debug', 'local_tawkto'), get_string('setting_debug_description', 'local_tawkto'), '0'));
	
	// enable?
    $settings->add(new admin_setting_configcheckbox('local_tawkto/enabled',
        get_string('setting_enable', 'local_tawkto'), get_string('setting_enable_description', 'local_tawkto'), '0'));
	
	// Widget-Link
	$settings->add(new admin_setting_configtext('local_tawkto/widgetlink', 
        get_string('setting_widgetlink', 'local_tawkto'), get_string('setting_widgetlink_description', 'local_tawkto'), '', PARAM_RAW));
	

}

