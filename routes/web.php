<?php

// use App\Classes\StudentClass;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentSettingsController;
use App\Http\Controllers\TeacherSettingsController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentAccessGradesController;
use App\Http\Controllers\StudentCourseMaterialsController;
use App\Http\Controllers\StudentFinancialStatusController;
use App\Http\Controllers\StudentSubmitAssignmentController;
use App\Http\Controllers\TeacherGradeAssignmentsController;
use App\Http\Controllers\TeacherSubmitAssignmentsController;
use App\Http\Controllers\TeacherUploadCourseMaterialsController;

// Public routes (no authentication required)
Route::get('/', function () {
    return view('index');
});

//user routes
Route::get('student/signup/', [UserController::class, 'create'])->name('student.register.form');
Route::post('/student/signup', [UserController::class, 'store'])->name('student.register.submit');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');



// Protected student routes (authentication required)
Route::prefix('/student')->middleware(['auth', 'authenticated:1'])->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/course-materials', [StudentCourseMaterialsController::class, 'course_materials'])->name('course-materials');
    Route::get('/submit-assignment', [StudentSubmitAssignmentController::class, 'submit_assignment'])->name('submit-assignment');
    Route::get('/access-grades', [StudentAccessGradesController::class, 'access_grades'])->name('access-grades');
    Route::get('/financial-status', [StudentFinancialStatusController::class, 'financial_status'])->name('financial-status');
    Route::get('/settings', [StudentSettingsController::class, 'settings'])->name('settings');

    // file upload and download routes
    Route::get('download/{filename}', [StudentCourseMaterialsController::class, 'download'])->name('file.download');

});




// Protected teacher routes (authentication required)
Route::prefix('/teacher')->middleware(['auth', 'authenticated:2'])->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload-course-materials', [TeacherUploadCourseMaterialsController::class, 'upload_course_materials'])->name('upload-course-materials');
    Route::get('/submit-assignment', [TeacherSubmitAssignmentsController::class, 'submit_assignment'])->name('submit-assignment');
    Route::get('/grade-assignments', [TeacherGradeAssignmentsController::class, 'grade_assignments'])->name('grade-assignments');
    Route::get('/settings', [TeacherSettingsController::class, 'settings'])->name('settings');
    
});


//admin routes

Route::prefix('/admin')->middleware('auth', 'authenticated:3')->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/students', [AdminDashboardController::class, 'students'])->name('students');
    Route::get('/teachers', [AdminDashboardController::class, 'teachers'])->name('teachers');
    Route::get('/admin/students/{id}/edit', [StudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/admin/students/{id}', [StudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/admin/students/{id}', [StudentController::class, 'destroy'])->name('admin.students.delete');
});