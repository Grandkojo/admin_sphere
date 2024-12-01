<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Program;
use App\Classes\UserClass;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminStudentsController extends Controller
{
    public function students(Request $request)
    {
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
        return view('admin.students', compact('departments', 'users', 'programs', 'selected_program'));
    }

    public function create_student(Request $request, UserClass $userClass)
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
        $incomingFields['role'] = 1;
        User::create($incomingFields);

        return redirect()->route('admin.students')->with('success', 'Student created successfully');
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

        return view('admin.students', compact('departments', 'users', 'programs', 'search', 'selected_program'));
    }

    public function destroy($id)
    {
        //delete a student
        $student = User::findOrFail($id);
        // return $student;
        $student->delete();
        return redirect()->route('admin.students')->with('success', 'Student deleted successfully');
    }
}
