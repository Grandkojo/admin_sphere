<?php

// use App\Classes\StudentClass;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminCoursesController;
use App\Http\Controllers\AdminProgramsController;
use App\Http\Controllers\AdminStudentsController;
use App\Http\Controllers\AdminTeachersController;
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
use App\Http\Controllers\TeacherCourseMaterialsController;

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
    Route::get('/course-materials', [TeacherCourseMaterialsController::class, 'course_materials'])->name('course-materials');
    Route::post('/upload-course-material', [TeacherCourseMaterialsController::class, 'upload_course_material'])->name('upload-course-material');
    Route::delete('/delete-course-material/{id}', [TeacherCourseMaterialsController::class, 'destroy'])->name('course-material.destroy');
    Route::get('/edit-course-material/{id}', [TeacherCourseMaterialsController::class, 'edit_course_material'])->name('course-material.edit');

    Route::get('/submit-assignments', [TeacherSubmitAssignmentsController::class, 'submit_assignment'])->name('submit-assignments');
    Route::get('/grade-assignments', [TeacherGradeAssignmentsController::class, 'grade_assignments'])->name('grade-assignments');
    Route::get('/settings', [TeacherSettingsController::class, 'settings'])->name('settings');
    
});


//admin routes
Route::prefix('/admin')->middleware('auth', 'authenticated:3')->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/programs', [AdminProgramsController::class, 'programs'])->name('programs');
    Route::get('/programs/{id}/edit', [AdminProgramsController::class, 'edit'])->name('programs.edit');
    Route::delete('/programs/{id}', [AdminProgramsController::class, 'destroy'])->name('programs.destroy');
    Route::get('/programs/filter', [AdminProgramsController::class, 'filterprogramByName'])->name('programs.filter');
    Route::post('/programs/new', [AdminProgramsController::class, 'add_program'])->name('programs.new');

    Route::get('/courses', [AdminCoursesController::class, 'courses'])->name('courses');
    Route::get('/courses/{id}/edit', [AdminCoursesController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [AdminCoursesController::class, 'update'])->name('courses.update');
    Route::get('/courses/filter', [AdminCoursesController::class, 'filterCourseByName'])->name('courses.filter');
    Route::delete('/courses/{id}', [AdminCoursesController::class, 'destroy'])->name('courses.destroy');

    Route::get('/teachers', [AdminTeachersController::class, 'teachers'])->name('teachers');
    Route::get('/teachers/filter', [AdminTeachersController::class, 'filterTeacherByName'])->name('teachers.filter');
    Route::get('/teachers/{id}/edit', [AdminTeachersController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{id}', [AdminTeachersController::class, 'update'])->name('teachers.update');
    Route::delete('/teacher/{id}', [AdminTeachersController::class, 'destroy'])->name('teachers.destroy');
    Route::post('/teachers/new', [AdminTeachersController::class, 'create_teacher'])->name('teachers.new');
    Route::get('/teachers/courses-by-department/{deparment_id}', [AdminTeachersController::class, 'getCoursesForDepartment'])->name('teacher.get-courses-by-department');
    // Route::get('/teachers/{id}', [AdminTeachersController::class, 'details'])->name('teachers.details');


    Route::get('/students', [AdminStudentsController::class, 'students'])->name('students');
    Route::post('/students/new', [AdminStudentsController::class, 'create_student'])->name('students.new');
    // Route::get('/students/{id}', [AdminStudentsController::class, 'details'])->name('students.details');
    Route::get('/students/{id}/edit', [AdminStudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [AdminStudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [AdminStudentsController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/filter', [AdminStudentsController::class, 'filterStudentByName'])->name('students.filter');

});

// Route::prefix('admin/api')->middleware('auth', 'authenticated:3')->name('admin.api.')->group(function(){
//     Route::get('/program_filter', [AdminCoursesController::class, 'getProgram'])->name('program_filter');
// });