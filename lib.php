<?php

function block_learning_path_get_learning_paths(): array
{
    $choices = [];
    $allcourses = core_course_category::get(0)->get_courses(array('recursive' => true));
    foreach ($allcourses as $course) {
        if (!empty($course->idnumber)) {
            $choices[$course->id] = explode('_', $course->idnumber)[1];
        }
    }
    return $choices;
}