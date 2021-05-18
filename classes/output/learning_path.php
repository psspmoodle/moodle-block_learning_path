<?php

namespace block_learning_path\output;

use core_course_category;
use renderable;
use renderer_base;
use stdClass;
use templatable;

class learning_path implements renderable, templatable
{
    /**
     * @var core_course_category|false|null
     */
    private $lp;

    private $items;

    public function __construct($lpid)
    {
        $allcourses = core_course_category::get(0)->get_courses(array('recursive' => true));
        foreach ($allcourses as $course) {
            if (!empty($course->idnumber)) {
                $choices[$course->id] = explode('_', $course->idnumber)[1];
            }
        }

    }

    protected function process_learning_path_items($output)
    {
//        $courses = $this->category->get_courses();
//        foreach ($courses as $course) {
//             $lp = new learning_path_item($course);
//            $this->items[] = $lp->export_for_template($output);
//       }
//        return $this->items;
    }

    public function export_for_template(renderer_base $output)
    {
        $data = new stdClass();
        $data->items = $this->process_learning_path_items($output);
        return $data;

    }
}