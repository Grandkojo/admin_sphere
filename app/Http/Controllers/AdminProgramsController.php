<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function add_program(Request $request){
        // return response()->json("Yes");
        $incomingFields = $request->validate([
            'program_name' => ['required', 'string', 'min:3'],
            'program_code' => ['required', 'string', 'min:2', Rule::unique('programs', 'program_code')],
            'program_type' => ['required', 'string', Rule::in(["BSC", "MSC", "BA"])],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'program_description' => ['required', 'string', 'min:10'],
            'program_duration' => ['required', 'integer', Rule::in([1, 2, 4, 6])],
        ]);
        // return response()->json($incomingFields);
        // dd($incomingFields); exit;

        Program::create($incomingFields);
        return redirect()->route('admin.programs')->with('success', 'Program created successfully');
    }
}
