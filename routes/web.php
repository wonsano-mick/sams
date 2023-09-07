<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolInfoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\setup\sba\SBAController;
use App\Http\Controllers\backend\setup\house\HouseController;
use App\Http\Controllers\backend\setup\staff\StaffController;
use App\Http\Controllers\backend\setup\Program\ProgramController;
use App\Http\Controllers\backend\setup\student\StudentController;
use App\Http\Controllers\backend\setup\subject\SubjectController;
use App\Http\Controllers\backend\setup\class\CurrentClassController;
use App\Http\Controllers\backend\setup\academicYear\AcademicYearController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*==========================================================================
            Users Routes
===========================================================================*/
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/view', [UserController::class, 'UserView'])->name('users.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::delete('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
});

/*==========================================================================
            User Profile Routes
===========================================================================*/
Route::prefix('profiles')->middleware('auth')->group(function () {
    Route::get('/view', [UserProfileController::class, 'ProfileView'])->name('profiles.view');
    Route::post('/personal.infomation.update', [UserProfileController::class, 'PersonalInfomationUpdate'])->name('profiles.personal.infomation.update');
    Route::get('/password', [UserProfileController::class, 'PasswordView'])->name('profiles.password');
    Route::post('/password/update', [UserProfileController::class, 'updatePassword'])->name('profiles.password.update');
});

/*==========================================================================
            Programs Routes
===========================================================================*/
Route::prefix('programs')->middleware('auth')->group(function () {
    Route::get('/list', [ProgramController::class, 'index'])->name('programs.list');
    Route::get('/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/store', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/edit{id}', [ProgramController::class, 'edit'])->name('programs.edit');
    Route::post('/update{id}', [ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/delete/{id}', [ProgramController::class, 'delete'])->name('programs.delete');
});

/*==========================================================================
            House Routes
===========================================================================*/
Route::prefix('houses')->middleware('auth')->group(function () {
    Route::get('/list', [HouseController::class, 'index'])->name('houses.list');
    Route::get('/create', [HouseController::class, 'create'])->name('houses.create');
    Route::post('/store', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/edit{id}', [HouseController::class, 'edit'])->name('houses.edit');
    Route::post('/update{id}', [HouseController::class, 'update'])->name('houses.update');
    Route::delete('/delete{id}', [HouseController::class, 'delete'])->name('houses.delete');
    Route::get('/students/{house}', [HouseController::class, 'students'])->name('houses.students');
});

/*==========================================================================
            Student Routes
===========================================================================*/
Route::prefix('students')->middleware('auth')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('/');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/edit{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/update{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/destroy{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

/*==========================================================================
            Class Routes
===========================================================================*/
Route::prefix('classes')->middleware('auth')->group(function () {
    Route::get('/students/{class}', [CurrentClassController::class, 'students'])->name('classes.students');
    Route::post('/store', [CurrentClassController::class, 'classStore'])->name('classes.store');
    Route::get('/list', [CurrentClassController::class, 'classList'])->name('classes.list');
    Route::post('/masters/store', [CurrentClassController::class, 'formMastersstore'])->name('classes.masters.store');
});

/*==========================================================================
            Academic Year Routes
===========================================================================*/
Route::prefix('academics')->middleware('auth')->group(function () {
    Route::resource('/years', AcademicYearController::class);
    Route::get('/years', [AcademicYearController::class, 'index'])->name('academics.years');
    Route::get('/sba', [SBAController::class, 'index'])->name('academics.sba');
    Route::post('/sba/load', [SBAController::class, 'load'])->name('academics.sba.load');
    Route::get('/sba/create', [SBAController::class, 'create'])->name('academics.sba.create');
    Route::post('/sba/store', [SBAController::class, 'store'])->name('academics.sba.store');
});

/*==========================================================================
            Subject Routes
===========================================================================*/
Route::prefix('subjects')->middleware('auth')->group(function () {
    Route::post('/store', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/list', [SubjectController::class, 'index'])->name('subjects.list');
});

/*==========================================================================
            Staff Routes
===========================================================================*/
Route::prefix('staff')->middleware('auth')->group(function () {
    Route::get('/list', [StaffController::class, 'index'])->name('staff.list');
    Route::get('/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/edit{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('/update{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/destroy{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::get('/subjects', [StaffController::class, 'staffSubjects'])->name('staff.subjects');
    Route::post('/subjects/store', [StaffController::class, 'staffSubjectsStore'])->name('staff.subjects.store');
    Route::get('/subjects/list', [StaffController::class, 'staffSubjectsList'])->name('staff.subjects.list');
    Route::get('/subject/edit{subjectId}', [StaffController::class, 'staffSubjectsEdit'])->name('staff.subject.edit');
    Route::put('/subjects/update{id}', [StaffController::class, 'staffSubjectsUpdate'])->name('staff.subjects.update');
    Route::delete('/subject/destroy{id}', [StaffController::class, 'staffSubjectDestroy'])->name('staff.subject.destroy');
});

/*==========================================================================
            School Registration Routes
===========================================================================*/
Route::resource('/schoolInfo', SchoolInfoController::class);

// Route::get('/update', [SchoolInfoController::class, 'updateall'])->name('update');
