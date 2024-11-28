<?php

// use App\Classes\StudentClass;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminCoursesController;
use App\Http\Controllers\AdminStudentsController;
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
    Route::get('/courses', [AdminCoursesController::class, 'courses'])->name('courses');
    Route::get('/admin/courses/{id}/edit', [AdminCoursesController::class, 'edit'])->name('courses.edit');
    Route::put('/admin/courses/{id}', [AdminCoursesController::class, 'update'])->name('courses.update');
    Route::delete('/admin/courses/{id}', [AdminCoursesController::class, 'destroy'])->name('courses.destroy');
    Route::get('/students', [AdminStudentsController::class, 'students'])->name('students');
    Route::get('/students/filter', [AdminStudentsController::class, 'filterStudentByName'])->name('students.filter');
    Route::get('/students/new', [AdminDashboardController::class, 'create_student'])->name('students.new');
    Route::get('/teachers', [AdminDashboardController::class, 'teachers'])->name('teachers');
    Route::get('/admin/students/{id}/edit', [AdminDashboardController::class, 'edit'])->name('users.edit');
    Route::put('/admin/students/{id}', [AdminDashboardController::class, 'update'])->name('users.update');
    Route::delete('/admin/students/{id}', [AdminDashboardController::class, 'destroy'])->name('users.destroy');

});

// Route::prefix('admin/api')->middleware('auth', 'authenticated:3')->name('admin.api.')->group(function(){
//     Route::get('/program_filter', [AdminCoursesController::class, 'getProgram'])->name('program_filter');
// });