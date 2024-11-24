<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function students(){
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        return view('admin.students', compact('departments'));
    }

    public function teachers(){
        return view('admin.teachers');
    }

    public function create_student(){
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();

        return view('admin.create_student', compact('departments'));
    }
}
