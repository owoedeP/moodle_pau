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
 * Frontpage layout for the moove theme.
 *
 * @package    theme_moove
 * @copyright  2022 Willian Mano {@link https://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
}

if (defined('BEHAT_SITE_RUNNING') && get_user_preferences('behat_keep_drawer_closed') != 1) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $secondary = $PAGE->secondarynav;

    if ($secondary->get_children_key_list()) {
        $tablistnav = $PAGE->has_tablist_secondary_navigation();
        $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
        $secondarynavigation = $moremenu->export_for_template($OUTPUT);
        $extraclasses[] = 'has-secondarynavigation';
    }

    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => \core\context\course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'summary' => "
    <div class='main' style='display: flex; flex-direction: row; width: 100%;'>
    <div style='flex: 1;'>
        <div>

                <strong style='color: #003366; font-size: 20px;'>Take our Benchmark Test to get ready for your 
                English language learning journey.</strong> <br>
            <p style = 'margin-top:17px; margin-bottom:20px'>
                Choose between the Basic and Intermediate tests based on your proficiency. 
                Success in the Beginners test unlocks access to the Intermediate course, while passing the Intermediate test grants entry to the Advanced course. 
                Take the test now for a personalized starting point in your language mastery journey.<br>
            </p>

            <p style='margin-top: 20px;'>
                <a href='http://127.0.0.1/moodle4.1/moodle/mod/hvp/view.php?id=28'>
                    <button style='background-color: #003366;
                        padding: 8px 12px; font-weight: bold; border-radius: 8px; border: 1px solid white; color: white;'>
                        Basic Benchmark Test
                    </button>
                </a>
                <a href='http://127.0.0.1/moodle4.1/moodle/mod/hvp/view.php?id=34&forceview=1'>
                    <button style='background-color: #003366;
                        padding: 8px 12px; font-weight: bold; border-radius: 8px; border: 1px solid white; color: white; margin-left: 15px;'>
                        Intermediate Benchmark Test
                    </button>
                </a>
            </p>
        </div>
    </div>

    <div style='flex: 1; border-left: 1px dotted black; padding-left: 20px; margin-top: 20px; margin-left: 20px;'>
        <div class='side' style='background-color: #003366; border-radius: 8px; padding: 10px;'>
            <p style='font-size: 15px; color: white; margin-left: 10px;'>
                <strong>If you have taken the test already:</strong> <br>
                If you have previously completed the Benchmark Test, you can proceed
                directly to continue your learning journey from where you left off.
            </p>
            <a href='http://127.0.0.1/moodle4.1/moodle/my/courses.php'>
                <button style='background-color: #003366;
                    padding: 8px 12px; font-weight: bold; border-radius: 8px;
                    border: 1px solid white; color: white; margin-top: 7px;
                    background-color: #ced4da; color: #003366;'>
                    Continue Course
                </button>
            </a>
        </div>
    </div>
</div>

"
];

$themesettings = new \theme_moove\util\settings();

$templatecontext = array_merge($templatecontext, $themesettings->footer());

if (isloggedin()) {
    echo $OUTPUT->render_from_template('theme_moove/drawers', $templatecontext);
} else {
    $templatecontext = array_merge($templatecontext, $themesettings->frontpage());

    echo $OUTPUT-> render_from_template('theme_moove/frontpage', $templatecontext);
}

