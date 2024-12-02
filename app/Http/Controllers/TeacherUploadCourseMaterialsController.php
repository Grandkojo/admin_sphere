<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Models\Department;

class TeacherUploadCourseMaterialsController extends Controller
{
    public function upload_course_materials(){

        $course_materials = CourseMaterial::all();
        $departments = Department::all();
        return view('teacher.upload-course-materials', compact('course_materials', 'departments'));
        // if (CourseMaterial::count() < 1) {
        //     $message = 'No course materials uploaded yet';
        //     return view('teacher.upload-course-materials', compact('message'));
        // } else {
        //     $course_materials = CourseMaterial::all();
        //     return view('teacher.upload-course-materials', compact('course_materials'));
        // }

    }
}
