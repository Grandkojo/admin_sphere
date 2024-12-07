<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    public function courses(Request $request)
    {
        $programs = Program::all();
        $departments = Department::all();

        // Get the selected program (default is 'ALL')
        $selected_program = $request->get('program', 'ALL');

        // Query courses based on selected program
        $query = Course::query();
        if ($selected_program !== 'ALL') {
            $query->where('program_id', $selected_program);
        }
        $display_courses = $query->paginate(8)->appends(['program' => $selected_program]);

        // Pass data to the view
        return view('admin.courses', compact('display_courses', 'programs', 'selected_program', 'departments'));
    }

    // public function courses(Request $request)
    // {
    //     $courses = Course::paginate(8);
    //     $departments = Department::all();

    //     $programData = $this->getProgram($request);
    //     $programs = $programData['programs'];
    //     $filtered_programs = $programData['filtered_programs']; // Filtered programs (if needed)
    //     $selected_program = $programData['selected_program'];

    //     return view('admin.courses', compact('courses', 'programs', 'filtered_programs', 'selected_program', 'departments'));
    // }

    public function edit($id)
    {
        dd('Edit Course');
        exit;
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        $user = User::find($id);
        return view('admin.edit_Course', compact('departments', 'user'));
    }

    // public function getProgram(Request $request)
    // {
    //     $programs = Program::all();

    //     $selected_program = $request->get('program', 'ALL');
    //     // dd($selected_program); exit;
    //     $query = Course::query();

    //     if ($selected_program !== 'ALL') {
    //         $query->where('program_id', $selected_program);
    //     }
    //     $filtered_programs = $query->paginate(8);
    //     // dd($filtered_programs); exit;
    //     return [
    //         'programs' => $programs,
    //         'filtered_programs' => $filtered_programs,
    //         'selected_program' => $selected_program,
    //     ];
    // }

    public function filterCourseByName(Request $request)
    {
        // dd($request->all()); exit;

        $departments = Department::all();
        $programs = Program::all();
        $selected_program = $request->get('program', '');

        $search = $request->get('search');

        // dd($search); exit;

        //filter course by name
        $query = Course::query();
        $display_courses = $query->where(function ($query) use ($search) {
            $query->where('course_name', 'like', '%' . $search . '%')
                ->orWhere('course_description', 'like', '%' . $search . '%');
        })
            ->paginate(8)->appends(['search' => $search, 'program' => $selected_program]);

        return view('admin.courses', compact('departments', 'display_courses', 'programs', 'search', 'selected_program'));
    }


    public function delete($id)
    {
        dd('Delete Course');
        exit;
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.Courses')->with('success', 'Course deleted successfully');
    }
}
