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
 * Block for displayed logged in user's course completion status.
 * Displays overall, and individual criteria status for logged in user.
 *
 * @package    block_completionstatus
 * @copyright  2009-2012 Catalyst IT Ltd
 * @author     Aaron Barnes <aaronb@catalyst.net.nz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_completionstatus extends block_base {

    public function init() {
        global $CFG;

        require_once("{$CFG->libdir}/completionlib.php");

        $this->title = get_string('pluginname', 'block_completionstatus');
    }

    public function applicable_formats() {
        return array('course' => true);
    }

    public function get_content() {
        global $USER;

        $rows = array();
        $srows = array();
        $prows = array();
        // If content is cached.
        if ($this->content !== null) {
            return $this->content;
        }

        $course = $this->page->course;
        $context = context_course::instance($course->id);

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        // Can edit settings?
        $can_edit = has_capability('moodle/course:update', $context);

        // Get course completion data.
        $info = new completion_info($course);

        // Don't display if completion isn't enabled!
        if (!completion_info::is_enabled_for_site()) {
            if ($can_edit) {
                $this->content->text .= get_string('completionnotenabledforsite', 'completion');
            }
            return $this->content;

        } else if (!$info->is_enabled()) {
            if ($can_edit) {
                $this->content->text .= get_string('completionnotenabledforcourse', 'completion');
            }
            return $this->content;
        }

        // Load criteria to display.
        $completions = $info->get_completions($USER->id);

        // Check if this course has any criteria.
        if (empty($completions)) {
            if ($can_edit) {
                $this->content->text .= get_string('nocriteriaset', 'completion');
            }
            return $this->content;
        }

        // Check this user is enroled.
        if ($info->is_tracked_user($USER->id)) {

            // Generate markup for criteria statuses.
            $data = '';

            // For aggregating activity completion.
            $activities = array();
            $activities_complete = 0;

            // For aggregating course prerequisites.
            $prerequisites = array();
            $prerequisites_complete = 0;

            // Flag to set if current completion data is inconsistent with what is stored in the database.
            $pending_update = false;

            // Loop through course criteria.
            foreach ($completions as $completion) {
                $criteria = $completion->get_criteria();
                $complete = $completion->is_complete();

                if (!$pending_update && $criteria->is_pending($completion)) {
                    $pending_update = true;
                }

                // Activities are a special case, so cache them and leave them till last.
                if ($criteria->criteriatype == COMPLETION_CRITERIA_TYPE_ACTIVITY) {
                    // Check if the user has completed or is in progress with the activity.
                    if ($complete || $completion->get_progress() > 0) {
                        $row = new html_table_row();
                        $row->cells[0] = new html_table_cell($criteria->get_title());
                        $row->cells[1] = new html_table_cell($completion->get_status());
                        $row->cells[1]->style = 'text-align: right;';
                        $srows[] = $row;
                    }

                    continue;
                }

                // Prerequisites are also a special case, so cache them and leave them till last.
                if ($criteria->criteriatype == COMPLETION_CRITERIA_TYPE_COURSE) {
                    // Check if the user has completed the prerequisite.
                    if ($complete) {
                        $row = new html_table_row();
                        $row->cells[0] = new html_table_cell($criteria->get_title());
                        $row->cells[1] = new html_table_cell($completion->get_status());
                        $row->cells[1]->style = 'text-align: right;';
                        $prows[] = $row;
                    }

                    continue;
                }
                $row = new html_table_row();
                $row->cells[0] = new html_table_cell($criteria->get_title());
                $row->cells[1] = new html_table_cell($completion->get_status());
                $row->cells[1]->style = 'text-align: right;';
                $srows[] = $row;
            }

            // Aggregate activities.
            if (!empty($activities)) {
                $a = new stdClass();
                $a->first = $activities_complete;
                $a->second = count($activities);

                $row = new html_table_row();
                $row->cells[0] = new html_table_cell(get_string('activitiescompleted', 'completion'));
                $row->cells[1] = new html_table_cell(get_string('firstofsecond', 'block_completionstatus', $a));
                $row->cells[1]->style = 'text-align: right;';
                $srows[] = $row;
            }

            // Aggregate prerequisites.
            if (!empty($prerequisites)) {
                $a = new stdClass();
                $a->first = $prerequisites_complete;
                $a->second = count($prerequisites);

                $row = new html_table_row();
                $row->cells[0] = new html_table_cell(get_string('dependenciescompleted', 'completion'));
                $row->cells[1] = new html_table_cell(get_string('firstofsecond', 'block_completionstatus', $a));
                $row->cells[1]->style = 'text-align: right;';
                $prows[] = $row;

                $srows = array_merge($prows, $srows);
            }

            // ... (existing code)
        } else {
            // If user is not enrolled, show error.
            $this->content->text = get_string('nottracked', 'completion');
        }

        if (has_capability('report/completion:view', $context)) {
            $report = new moodle_url('/report/completion/index.php', array('course' => $course->id));
            if (empty($this->content->footer)) {
                $this->content->footer = '';
            }
            $this->content->footer .= html_writer::empty_tag('br');
            $this->content->footer .= html_writer::link($report, get_string('viewcoursereport', 'completion'));
        }

        return $this->content;
    }

    /**
     * This block shouldn't be added to a page if the completion tracking advanced feature is disabled.
     *
     * @param moodle_page $page
     * @return bool
     */
    public function can_block_be_added(moodle_page $page): bool {
        global $CFG;

        return $CFG->enablecompletion;
    }
}
