<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    public function students(Request $request)
    {
        // $users = User::where('role', 1)->paginate(8);
        // dd($users); exit;
        $departments = Department::all();
        $programs = Program::all();
        $selected_program = $request->get('program', 'ALL');

        // Query students based on selected program
        $query = User::query();
        if ($selected_program !== 'ALL') {
            $query->where('program_id', $selected_program)
                ->where('role', 1);
        }
        $users = $query->where('role', 1)->paginate(8)->appends(['program' => $selected_program]);
        // // $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        // $dept_name = Department::where('department_code', '!=', 'ADMIN')->pluck('department_name', 'id');
        return view('admin.students', compact('departments', 'users', 'programs', 'selected_program'));

        // return view('admin.students', compact('departments', 'users', 'dept_name', 'programs', 'selected_program', 'display_courses'));
    }

    public function filterStudentByName(Request $request)
    {
        $departments = Department::all();
        $programs = Program::all();
        $selected_program = $request->get('program', '');

        $search = $request->get('search');
        //filter students by name
        $query = User::query();
        $users = $query->where('role', 1)
            ->where('role', 1)
            ->where(function ($query) use ($search) {
                $query->where('last_name', 'like', '%' . $search . '%')
                    ->orWhere('other_names', 'like', '%' . $search . '%');
            })
            ->paginate(8);

        // return response()->json($users);

        return view('admin.students', compact('departments', 'users', 'programs', 'search', 'selected_program'));
    }
}
