<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherCourseMaterialsController extends Controller
{
    public function course_materials()
    {

        $course_materials = CourseMaterial::where('teacher_id', Auth::user()->user_id)->get()->map(function($material){
            $material->file_url = Storage::url($material->file_path);
            // $material->file_name = basename($material->file_path);
            return $material;
        });


        $courses = Course::where('course_code', Auth::user()->course_code)->get();

     
        return view('teacher.course-materials', compact('course_materials', 'courses'));

    }

    public function upload_course_material(Request $request)
    {
        $teacher_id = Auth::user()->user_id;
        if ($teacher_id) {

            $incomingFields = $request->validate(
                [
                    'course_material_description' => ['required', 'min:5', 'string'],
                    'file_upload' => ['required', 'file', 'mimes:pdf,docx,pptx', 'max:5120'],
                    'course_code' => ['required', 'string', 'exists:courses,course_code']
                ],
                [
                    'file_upload.required' => 'Please upload a file.',
                    'file_upload.mimes' => 'Only PDF, DOCX, and PPTX files are allowed.',
                    'file_upload.max' => 'The file may not be greater than 5MB.',
                ]
            );

            $incomingFields['teacher_id'] = $teacher_id;

            $file = $request->file('file_upload');
            $fileName = $file->getClientOriginalName();


            if (Storage::disk('public')->exists('course_materials/' . $fileName)) {
                return redirect()->route('teacher.course-materials')->with('fail', 'This file has already been uploaded');
            }

            // Store the file if not exists
            $filePath = $file->storeAs('course_materials', $fileName, 'public');
            
            $incomingFields['file_name'] = $fileName;
            CourseMaterial::create([
                'material_description' => $incomingFields['course_material_description'],
                'file_path' => $filePath,
                'teacher_id' => $incomingFields['teacher_id'],
                'course_code' => $incomingFields['course_code'],
                'file_name' => $incomingFields['file_name']
            ]);

            return redirect()->route('teacher.course-materials')->with('success', 'Course material added succesfully');
        } else {
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }
    }
}
