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
use block_learning_path\output\learning_path;

/**
 * Form for editing HTML block instances.
 *
 * @package   block_learning_path
 * @copyright 2021 Matt Donnelly, CAMH
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_learning_path extends block_base
{
    /**
     * @throws coding_exception
     */
    function init() {
        $this->title = get_string('pluginname', 'block_learning_path');
    }

    /**
     * @return stdClass|stdObject|null
     * @throws dml_exception
     * @throws moodle_exception
     */
    function get_content()
    {
        global $OUTPUT;
        $lpid = get_config('block_myoverview', 'learningpathselect');
        $this->content = new stdClass();
        $this->content->text = $OUTPUT->render(new learning_path($lpid));
        return $this->content;
    }

    /**
     * Why is there no better way to change the default region on a block?
     *
     * @throws dml_exception
     */
    function specialization()
    {
        global $DB;
        $this->instance->defaultregion = 'content';
        $this->instance->defaultweight = 0;
        $DB->update_record('block_instances', $this->instance);
    }

    /**
     * Tell Moodle that a settings.php file exists and should be included
     *
     * @return bool
     */
    function has_config(): bool
    {
        return true;
    }

}