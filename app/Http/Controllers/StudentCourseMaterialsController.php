<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentCourseMaterialsController extends Controller
{
    public function course_materials(Request $request)
    {
        $selected_course = $request->get('course', 'ALL');

        $courses = Course::where('program_id', Auth::user()->program_id)->get();



        if ($selected_course !== 'ALL') {
            $course_materials = CourseMaterial::where('course_code', $selected_course, 'and' , 'id', Auth::user()->id);

            // $course_materials = CourseMaterial::whereIn('course_code', function($query) use ($selected_course) {
            //     $query->select('course_code')
            //     ->from('courses')
            //     ->where('program_', function($subquery) use ($selected_course){
            //         $subquery->select('')
            // } )
            // });
        }
        $course_materials = CourseMaterial::whereIn('course_code', function ($query) {
            $query->select('course_code')
                ->from('courses')
                ->where('program_id', function ($subquery) {
                    $subquery->select('id')
                        ->from('programs')
                        ->where('id', Auth::user()->program_id);
                });
        })->paginate(8)->map(function ($material) {
            $material->file_url = Storage::url($material->file_path);
            return $material;
        });


        // return response()->json($course_materials);
        return view('student.course-materials', compact('selected_course', 'courses', 'course_materials'));
    }

    // if (CourseMaterial::count() < 1) {
    //     $message = 'No course materials uploaded yet';
    //     return view('student.course-materials', compact('message'));
    // } else {
    //     $course_materials = CourseMaterial::all();
    //     return view('student.course-materials', compact('course_materials'));
    // }
    // }



    //     public function download(Request $request)
    // {
    //     $id = $request->id; // You can use this to fetch additional details if necessary
    //     $file = public_path() . "/files/" . $request->file; // Path to the file

    //     // Check if the file exists before proceeding
    //     if (file_exists($file)) {
    //         $fileName = basename($file); // Extract the file name from the full path
    //         $fileContent = file_get_contents($file); // Get the content of the file

    //         $headers = [
    //             'Content-Type' => 'application/pdf',
    //             'Content-Description' => 'File Transfer',
    //             'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
    //             'Content-Length' => strlen($fileContent),
    //             'Cache-Control' => 'must-revalidate',
    //             'Pragma' => 'public',
    //             'Expires' => 0,
    //         ];

    //         return response()->download($file, $fileName, $headers);
    //     } else {
    //         // Handle file not found error
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }

}
