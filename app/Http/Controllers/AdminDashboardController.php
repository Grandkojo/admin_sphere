<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function students(){
        return view('admin.students');
    }

    public function teachers(){
        return view('admin.teachers');
    }
}
