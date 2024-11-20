<?php

namespace App\Classes;

use App\Models\User;
use App\Models\Student;
use App\Classes\IndividualClass;

class StudentClass extends UserClass
{
    public $uniqueId;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function message()
    {
        echo "I'm a student!!";
    }

    public function get_course_materials($department_id){
        $course_materials = Courses::where('department_id', $department_id)->get();
    }


    
}
