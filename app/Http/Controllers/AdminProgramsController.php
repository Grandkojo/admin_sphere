<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminProgramsController extends Controller
{
    public function programs(Request $request)
    {
        $programs = Program::all();
        $departments = Department::all();

        // Get the selected program (default is 'ALL')
        $selected_department = $request->get('department', 'ALL');
        // dd($selected_department); exit;

        // Query programs based on selected department
        $query = Program::query();
        if ($selected_department !== 'ALL') {
            $query->where('department_id', $selected_department);
        }
        $display_programs = $query->paginate(8)->appends(['department' => $selected_department]);
        return view('admin.programs', compact('display_programs', 'programs', 'selected_department', 'departments'));
    }
}
