<?php
// This file is part of Moodle - http://moodle.org/
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
 * @package    filter
 * @subpackage loom
 * @author     Max MacCluer
 * @copyright  2021 Idaho State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Height of the embedded video player.
    $name = new lang_string('height', 'filter_loom');
    $desc = new lang_string('height_desc', 'filter_loom');
    $default = 300;
    $setting = new admin_setting_configtext('filter_loom/height', $name, $desc, $default, PARAM_INT, 8);
    $settings->add($setting);

    // Width of the embedded video player.
    $name = new lang_string('width', 'filter_loom');
    $desc = new lang_string('width_desc', 'filter_loom');
    $default = 400;
    $setting = new admin_setting_configtext('filter_loom/width', $name, $desc, $default, PARAM_INT, 8);
    $settings->add($setting);

    // Hide the owner of the embedded video.
    $name = new lang_string('hideowner', 'filter_loom');
    $desc = new lang_string('hideowner_desc', 'filter_loom');
    $default = false;
    $setting = new admin_setting_configcheckbox('filter_loom/hideowner', $name, $desc, $default);
    $settings->add($setting);

    // Hide the share button on the embedded video player.
    $name = new lang_string('hideshare', 'filter_loom');
    $desc = new lang_string('hideshare_desc', 'filter_loom');
    $default = false;
    $setting = new admin_setting_configcheckbox('filter_loom/hideshare', $name, $desc, $default);
    $settings->add($setting);

    // Hide the title of the embedded video.
    $name = new lang_string('hidetitle', 'filter_loom');
    $desc = new lang_string('hidetitle_desc', 'filter_loom');
    $default = false;
    $setting = new admin_setting_configcheckbox('filter_loom/hidetitle', $name, $desc, $default);
    $settings->add($setting);

    // Hide the embed top bar on the embedded video player.
    $name = new lang_string('hideembedtopbar', 'filter_loom');
    $desc = new lang_string('hideembedtopbar_desc', 'filter_loom');
    $default = false;
    $setting = new admin_setting_configcheckbox('filter_loom/hideembedtopbar', $name, $desc, $default);
    $settings->add($setting);

}