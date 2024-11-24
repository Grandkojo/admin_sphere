<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Classes\UserClass;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $departments = Department::where('department_code', '!=', 'ADMIN')->get();
        return view('student.register', compact('departments'));
    }



    public function store(Request $request, UserClass $userClass)
    {
        // echo "Holaaa my friends"; exit;
        $uniqueId = $userClass->generateUniqueId();

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'string', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => ['required', 'string', Rule::in(['1', '2'])],
            'gender' => ['required', 'string', Rule::in(['M', 'F'])],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['user_id'] = $uniqueId;
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        Auth::login($user);

        // Redirect to the login page
        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();


            if ($user->role === '1') {
                return redirect()->route('student.dashboard');
            } else if ($user->role === '2') {
                return redirect()->route('teacher.dashboard');
            } else if ($user->role === '3') {
                return redirect()->route('admin.dashboard');
            }
        }
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
