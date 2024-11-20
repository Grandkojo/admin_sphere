<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Classes\StudentClass;
use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function create(Request $request) {
        $departments = Department::all();
        return view('student.register', compact('departments'));
    }

    public function store(Request $request, StudentClass $studentClass)
    {
        // echo "Holaaa my friends"; exit;
        $uniqueId = $studentClass->generateUniqueId();

        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'string', Rule::unique('students', 'username')],
            'email' => ['required', 'email', Rule::unique('students', 'email')],
            'gender' => ['required', 'string', Rule::in(['M', 'F'])],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['student_id'] = $uniqueId;
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $student = Student::create($incomingFields);

        Auth::login($student);

        // Redirect to the dashboard
        // return redirect('student/dashboard');
        return redirect()->route('student.dashboard')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        // echo bcrypt($credentials['password']); exit;
        if (Auth::guard('student')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
