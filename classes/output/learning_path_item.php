<?php


namespace block_learning_path\output;


use context_course;
use core_course_list_element;
use renderable;
use renderer_base;
use stdClass;
use templatable;

class learning_path_item implements renderable, templatable
{

    private $course;
    private $isenroled;

    /**
     * learning_path_item constructor.
     * @param $course core_course_list_element Course record
     */
    public function __construct(core_course_list_element $course)
    {
        $this->course = $course;
        $this->isenroled = is_enrolled(context_course::instance($this->course->id));
    }

    private function get_message()
    {
        $message = '';
        if ($this->isenroled) {
            $message = 'You are enroled in this course.';
        }
        return $message;
    }

    public function export_for_template(renderer_base $output): stdClass
    {
        $data = new stdClass();
        $data->title = $this->course->fullname;
        $data->isenroled = $this->isenroled;
        $data->message = $this->get_message();
        return $data;

    }
}