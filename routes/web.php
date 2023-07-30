<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomSubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\SubClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherSubjectController;
use App\Http\Controllers\TermController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', fn () => view('welcome'))->name('home');

Route::group(['prefix' => 'classrooms', 'as' => 'classrooms.'], function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('index');
    Route::get('/create', [ClassroomController::class, 'create'])->name('create');
    Route::post('/store', [ClassroomController::class, 'store'])->name('store');
    Route::get('/edit/{classroom}', [ClassroomController::class, 'edit'])->name('edit');
    Route::patch('/update/{classroom}', [ClassroomController::class, 'update'])->name('update');
    Route::delete('/delete/{classroom}', [ClassroomController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'sub-classrooms', 'as' => 'sub-classrooms.'], function () {
    Route::get('/', [SubClassroomController::class, 'index'])->name('index');
    Route::get('/create', [SubClassroomController::class, 'create'])->name('create');
    Route::post('/store', [SubClassroomController::class, 'store'])->name('store');
    Route::get('/edit/{classroom}', [SubClassroomController::class, 'edit'])->name('edit');
    Route::patch('/update/{classroom}', [SubClassroomController::class, 'update'])->name('update');
    Route::delete('/delete/{classroom}', [SubClassroomController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'classroom-subjects', 'as' => 'classroom-subjects.'], function () {
    Route::get('/', [ClassroomSubjectController::class, 'index'])->name('index');
    Route::get('/create', [ClassroomSubjectController::class, 'create'])->name('create');
    Route::post('/store', [ClassroomSubjectController::class, 'store'])->name('store');
    Route::get('/edit/{classroom}', [ClassroomSubjectController::class, 'edit'])->name('edit');
    Route::patch('/update/{classroom}', [ClassroomSubjectController::class, 'update'])->name('update');
    Route::delete('/delete/{classroom}', [ClassroomSubjectController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::delete('/delete/{student}', [StudentController::class, 'destroy'])->name('destroy');
    Route::patch('/deactivate/{student}', [StudentController::class, 'deactivate'])->name('deactivate');
    Route::patch('/activate/{student}', [StudentController::class, 'activate'])->name('activate');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [StudentProfileController::class, 'index'])->name('index');
        Route::get('/create/{class}', [StudentProfileController::class, 'create'])->name('create');
        Route::post('/store', [StudentProfileController::class, 'store'])->name('store');
        Route::get('/show/{student}', [StudentProfileController::class, 'show'])->name('show');
        Route::get('/edit/{student}', [StudentProfileController::class, 'edit'])->name('edit');
        Route::patch('/update/{studentProfile}', [StudentProfileController::class, 'update'])->name('update');
    });
});

Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
    Route::get('/', [SubjectController::class, 'index'])->name('index');
    Route::get('/create', [SubjectController::class, 'create'])->name('create');
    Route::post('/store', [SubjectController::class, 'store'])->name('store');
    Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('edit');
    Route::patch('/update/{subject}', [SubjectController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
    Route::patch('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'teacher-subjects', 'as' => 'teacher-subjects.'], function () {
    Route::get('/', [TeacherSubjectController::class, 'index'])->name('index');
    Route::get('/create', [TeacherSubjectController::class, 'create'])->name('create');
    Route::post('/store', [TeacherSubjectController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [TeacherSubjectController::class, 'edit'])->name('edit');
    Route::patch('/update/{teacher}', [TeacherSubjectController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'teacher-classrooms', 'as' => 'teacher-classrooms.'], function () {
    Route::get('/', [TeacherClassroomController::class, 'index'])->name('index');
    Route::get('/create', [TeacherClassroomController::class, 'create'])->name('create');
    Route::post('/store', [TeacherClassroomController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [TeacherClassroomController::class, 'edit'])->name('edit');
    Route::patch('/update/{teacher}', [TeacherClassroomController::class, 'update'])->name('update');
});
