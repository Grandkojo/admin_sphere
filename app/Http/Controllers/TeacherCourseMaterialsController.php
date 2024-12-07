<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class TeacherCourseMaterialsController extends Controller
{
    public function course_materials()
    {

        $course_materials = CourseMaterial::all();
        // $departments = Department::where('department');

        $departments = Department::where('id', function ($query) {
            $query->select('department_id')
                ->from('programs')
                ->where('id', function ($subQuery) {
                    $subQuery->select('program_id')
                        ->from('courses')
                        ->where('course_code', Auth::user()->course_code);
                });
        })->get();

        return view('teacher.course-materials', compact('course_materials', 'departments'));
        // if (CourseMaterial::count() < 1) {
        //     $message = 'No course materials uploaded yet';
        //     return view('teacher.upload-course-materials', compact('message'));
        // } else {
        //     $course_materials = CourseMaterial::all();
        //     return view('teacher.upload-course-materials', compact('course_materials'));
        // }

    }

    public function upload_course_material(Request $request){

    }
}
