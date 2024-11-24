<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Classes\TeacherClass;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    public function create(Request $request) {
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        return view('teacher.register', compact('departments'));
    }

    public function store(Request $request, TeacherClass $teacherClass)
    {
        // echo "Holaaa my friends"; exit;
        $uniqueId = $teacherClass->generateUniqueId();

        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'string', Rule::unique('teachers', 'username')],
            'email' => ['required', 'email', Rule::unique('teachers', 'email')],
            'gender' => ['required', 'string', Rule::in(['M', 'F'])],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['teacher_id'] = $uniqueId;
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $teacher = Teacher::create($incomingFields);

        Auth::login($teacher);

        // Redirect to the dashboard
        // return redirect('teacher/dashboard');
        return redirect()->route('teacher.dashboard')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('teacher.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        // echo bcrypt($credentials['password']); exit;
        if (Auth::guard('teacher')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
