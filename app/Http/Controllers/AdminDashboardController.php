<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    // public function students(){
    //     return view('admin.students');
    // }


    

    public function teachers(){
        return view('admin.teachers');
    }

    public function create_student(){
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();

        return view('admin.create_student', compact('departments'));
    }

    public function edit($id){
        dd('Edit student'); exit;
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        $user = User::find($id);
        return view('admin.edit_student', compact('departments', 'user'));
    }


    public function delete($id){
        dd('Delete student'); exit;
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.students')->with('success', 'Student deleted successfully');
    }
}
