<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Program;
use App\Classes\UserClass;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\type;

class AdminTeachersController extends Controller
{
    public function teachers(Request $request)
    {
        $departments = Department::all();
        $programs = Program::all();
        $selected_department = $request->get('department', 'ALL');

        // Query students based on selected department
        $query = User::query();
        // if ($selected_department !== 'ALL') {
        //     $query->where('program_id', $selected_department)
        //         ->where('role', 2);
        // }
        $users = $query->where('role', 2)->paginate(8)->appends(['program' => $selected_department]);
        return view('admin.teachers', compact('departments', 'users', 'programs', 'selected_department'));
    }

    public function create_teacher(Request $request, UserClass $userClass)
    {
        //create a new student
        // return "Yes";
        $uniqueId = $userClass->generateUniqueId();

        $incomingFields = $request->validate([
            'last_name' => ['required', 'min:3', 'string', Rule::unique('users', 'last_name')],
            'other_names' => ['required', 'min:3', 'string', Rule::unique('users', 'other_names')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'type' => ['required', 'string', Rule::in(['regular', 'distance', 'fee_paying'])],
            'gender' => ['required', 'string', Rule::in(['M', 'F'])],
            'program_id' => ['required', 'integer', 'exists:programs,id'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['user_id'] = $uniqueId;
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $incomingFields['role'] = 2;
        User::create($incomingFields);

        return redirect()->route('admin.teachers')->with('success', 'Teacher created successfully');
    }


    public function filterTeacherByName(Request $request)
    {
        $departments = Department::all();
        $programs = Program::all();
        $selected_department = $request->get('program', '');

        $search = $request->get('search');

        //filter teachers by name
        $query = User::query();
        $users = $query->where('role', 2)
            ->where('role', 2)
            ->where(function ($query) use ($search) {
                $query->where('last_name', 'like', '%' . $search . '%')
                    ->orWhere('other_names', 'like', '%' . $search . '%');
            })
            ->paginate(8);

        return view('admin.teachers', compact('departments', 'users', 'programs', 'search', 'selected_department'));
    }

    public function getCoursesForDepartment($department_id)
    {
        if (is_string($department_id)) {

            $courses = Course::whereIn('program_id', function ($query) use ($department_id) {
                $query->select('id')
                    ->from('programs')
                    ->where('department_id', function ($subQuery) use ($department_id) {
                        $subQuery->select('id')
                            ->from('departments')
                            ->where('id', $department_id);
                    });
            })->get();

            return response()->json($courses);
        } else {
            return response()->json('Parameter should be an integer');
        }
    }

    public function destroy($id)
    {
        //delete a student
        $student = User::findOrFail($id);
        // return $student;
        $student->delete();
        return redirect()->route('admin.teachers')->with('success', 'Teacher deleted successfully');
    }

    public function details($id)
    {
        return "Yes";
        $student = User::findOrFail($id);
        return view('admin.student_details', compact('student'));
    }
}
