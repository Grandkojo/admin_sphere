<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function download($filename)
    {
        $user = Auth::user();
        if ($user->role === '1') {
            $filePath = public_path('/storage/documents/students') . $filename;

            if (file_exists($filePath)) {   
                return response()->download($filePath, $filename);
            } else {
                return response()->json(['error', 'File not found!'], 404);
            }
        } else if ($user->role === '2') {

            $filePath = public_path('storage/documents/teachers') . $filename;
            if (file_exists($filePath)) {
                return response()->download($filePath, $filename);
            } else {
                return response()->json(['error', 'File not found!'], 404);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
