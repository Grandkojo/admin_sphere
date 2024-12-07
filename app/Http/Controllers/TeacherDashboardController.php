<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function dashboard(){
        $departments = Department::all();
        $courses = Course::all();
        return view('teacher.dashboard', compact('courses'));
    }

}
