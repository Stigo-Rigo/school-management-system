<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignCourseController;
use App\Http\Controllers\Backend\Setup\CourseController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentMajorController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\RegisterStudentController;
use App\Http\Controllers\Backend\UserController;
use App\Models\RegisterStudent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// All routes for the users
Route::prefix('users')->group(function() {
    Route::get('/view', [UserController::class, 'index'])->name('users.view');
    Route::get('/add', [UserController::class, 'create'])->name('users.add');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});

//----------- All routes for the profile
Route::prefix('profile')->group(function() {
    Route::get('/view', [ProfileController::class, 'index'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'passwordIndex'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});

//--------------Set Up-------------------------//
Route::prefix('setup')->group(function() {
    //Student Class routes
    Route::get('class/view', [StudentClassController::class, 'index'])->name('student.class.view');
    Route::get('class/add', [StudentClassController::class, 'create'])->name('student.class.add');
    Route::post('class/store', [StudentClassController::class, 'store'])->name('student.class.store');
    Route::get('class/edit/{id}', [StudentClassController::class, 'edit'])->name('student.class.edit');
    Route::post('class/update/{id}', [StudentClassController::class, 'update'])->name('student.class.update');
    Route::get('class/delete/{id}', [StudentClassController::class, 'destroy'])->name('student.class.delete');

    //Student year routes
    Route::get('year/view', [StudentYearController::class, 'index'])->name('student.year.view');
    Route::get('year/add', [StudentYearController::class, 'create'])->name('student.year.add');
    Route::post('year/store', [StudentYearController::class, 'store'])->name('student.year.store');
    Route::get('year/edit/{id}', [StudentYearController::class, 'edit'])->name('student.year.edit');
    Route::post('year/update/{id}', [StudentYearController::class, 'update'])->name('student.year.update');
    Route::get('year/delete/{id}', [StudentYearController::class, 'destroy'])->name('student.year.delete');

    //Student Major routes
    Route::get('major/view', [StudentMajorController::class, 'index'])->name('student.major.view');
    Route::get('major/add', [StudentMajorController::class, 'create'])->name('student.major.add');
    Route::post('major/store', [StudentMajorController::class, 'store'])->name('student.major.store');
    Route::get('major/edit/{id}', [StudentMajorController::class, 'edit'])->name('student.major.edit');
    Route::post('major/update/{id}', [StudentMajorController::class, 'update'])->name('student.major.update');
    Route::get('major/delete/{id}', [StudentMajorController::class, 'destroy'])->name('student.major.delete');

    //Student Shift routes
    Route::get('shift/view', [StudentShiftController::class, 'index'])->name('student.shift.view');
    Route::get('shift/add', [StudentShiftController::class, 'create'])->name('student.shift.add');
    Route::post('shift/store', [StudentShiftController::class, 'store'])->name('student.shift.store');
    Route::get('shift/edit/{id}', [StudentShiftController::class, 'edit'])->name('student.shift.edit');
    Route::post('shift/update/{id}', [StudentShiftController::class, 'update'])->name('student.shift.update');
    Route::get('shift/delete/{id}', [StudentShiftController::class, 'destroy'])->name('student.shift.delete');

    //Fee Category routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'index'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'create'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'store'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'edit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'update'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'destroy'])->name('fee.category.delete');

    //Fee Amount routes
    Route::get('fee/amount/view', [FeeAmountController::class, 'index'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'create'])->name('fee.amount.add');
    Route::post('fee/amount/store', [FeeAmountController::class, 'store'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{id}', [FeeAmountController::class, 'edit'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'update'])->name('fee.amount.update');
    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'details'])->name('fee.amount.details');

    //Exams routes
    Route::get('exam/type/view', [ExamTypeController::class, 'index'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'create'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'store'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'edit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'update'])->name('exam.type.update');
    Route::get('exam/type/{id}', [ExamTypeController::class, 'destroy'])->name('exam.type.delete');

    //Course routes
    Route::get('course/view', [CourseController::class, 'index'])->name('school.course.view');
    Route::get('course/add', [CourseController::class, 'create'])->name('school.course.add');
    Route::post('course/store', [CourseController::class, 'store'])->name('school.course.store');
    Route::get('course/edit/{id}', [CourseController::class, 'edit'])->name('school.course.edit');
    Route::post('course/update/{id}', [CourseController::class, 'update'])->name('school.course.update');
    Route::get('course/{id}', [CourseController::class, 'destroy'])->name('school.course.delete');

    //Assign Course routes
    Route::get('assign/course/view', [AssignCourseController::class, 'index'])->name('assign.course.view');
    Route::get('assign/course/add', [AssignCourseController::class, 'create'])->name('assign.course.add');
    Route::post('assign/course/store', [AssignCourseController::class, 'store'])->name('assign.course.store');
    Route::get('assign/course/edit/{id}', [AssignCourseController::class, 'edit'])->name('assign.course.edit');
    Route::post('assign/course/update/{course_id}', [AssignCourseController::class, 'update'])->name('assign.course.update');
    Route::get('assign/course/{course_id}', [AssignCourseController::class, 'details'])->name('assign.course.details');
});

/***************** STUDENTS ***************/
Route::prefix('student')->group(function () {
    //Student Registration Routes
    Route::get('/reg/view', [RegisterStudentController::class, 'index'])->name('student.registration.view');
    Route::get('/reg/add', [RegisterStudentController::class, 'create'])->name('student.ragistration.add');
    Route::post('/reg/store', [RegisterStudentController::class, 'store'])->name('student.ragistration.store');
    Route::post('/year/class/wise', [RegisterStudentController::class, 'yearClassWise'])->name('student.year.class.wise');
    Route::get('/reg/edit/{id}', [RegisterStudentController::class, 'edit'])->name('student.ragistration.edit');
    Route::post('/reg/update/{course_id}', [RegisterStudentController::class, 'update'])->name('student.course.update');
    Route::get('/reg/{course_id}', [RegisterStudentController::class, 'details'])->name('student.course.details');
});