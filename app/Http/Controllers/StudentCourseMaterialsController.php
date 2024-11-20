<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class StudentCourseMaterialsController extends Controller
{
    public function course_materials()
    {
        if (CourseMaterial::count() < 1) {
            $message = 'No course materials uploaded yet';
            return view('student.course-materials', compact('message'));
        } else {
            $course_materials = CourseMaterial::all();
            return view('student.course-materials', compact('course_materials'));
        }
    }



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
