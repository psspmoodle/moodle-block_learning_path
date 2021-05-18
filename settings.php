<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot . '/blocks/learning_path/lib.php');

    // Category select heading
    $settings->add(new admin_setting_heading('block_learning_path/learningpathselectheader',
        get_string('learningpathselectheader', 'block_learning_path'),
        ''));

    $settings->add(new admin_setting_configselect(
        'block_learning_path/learningpathselect',
        get_string('learningpathselect', 'block_learning_path'),
        '',
        '',
        block_learning_path_get_learning_paths()
    ));
}

