<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class TeacherSubmitAssignmentsController extends Controller
{
    
    public function submit_assignment()
    {
        
        $assignments = Assignment::all();
        return view('teacher.submit-assignments', compact('assignments'));
    }
}
