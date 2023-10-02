<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomSubjectController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryPaymentController;
use App\Http\Controllers\OffenceController;
use App\Http\Controllers\OffencePaymentController;
use App\Http\Controllers\SchoolFeeAttributeController;
use App\Http\Controllers\SchoolFeeController;
use App\Http\Controllers\SchoolFeePaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\SubClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherSubjectController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', fn () => view('dashboard'))->name('home');

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
        Route::post('/store', [StudentProfileController::class, 'store'])->name('store');
        Route::get('/show/{student}', [StudentProfileController::class, 'show'])->name('show');
        Route::patch('/update/{studentProfile}', [StudentProfileController::class, 'update'])->name('update');
        Route::get('/search-by-class', [StudentProfileController::class, 'searchByClass'])->name('search-by-class');
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
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::patch('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'teacher-subjects', 'as' => 'teacher-subjects.'], function () {
    Route::get('/', [TeacherSubjectController::class, 'index'])->name('index');
    Route::post('/store', [TeacherSubjectController::class, 'store'])->name('store');
    Route::patch('/update/{teacher}', [TeacherSubjectController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'teacher-classrooms', 'as' => 'teacher-classrooms.'], function () {
    Route::get('/', [TeacherClassroomController::class, 'index'])->name('index');
    Route::post('/store', [TeacherClassroomController::class, 'store'])->name('store');
    Route::patch('/update/{teacher}', [TeacherClassroomController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'staffs', 'as' => 'staffs.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'school-fees', 'as' => 'school-fees.'], function () {
    Route::get('/', [SchoolFeeController::class, 'index'])->name('index');
    Route::post('/store', [SchoolFeeController::class, 'store'])->name('store');
    Route::patch('/update/{schoolFee}', [SchoolFeeController::class, 'update'])->name('update');
    Route::get('/search-by-class', [SchoolFeeController::class, 'searchByClass'])->name('search-by-class');
    Route::get('filter', [SchoolFeeController::class, 'fetchFilterData'])->name('get-filter-data');

    Route::group(['prefix' => 'attributes', 'as' => 'attributes.'], function () {
        Route::get('/', [SchoolFeeAttributeController::class, 'index'])->name('index');
        Route::post('/store', [SchoolFeeAttributeController::class, 'store'])->name('store');
        Route::patch('/update/{schoolFee}', [SchoolFeeAttributeController::class, 'update'])->name('update');
    });
});

Route::group(['prefix' => 'school-fee-payments', 'as' => 'school-fee-payments.'], function () {
    Route::get('/', [SchoolFeePaymentController::class, 'index'])->name('index');
    Route::post('/store', [SchoolFeePaymentController::class, 'store'])->name('store');
    Route::patch('/update/{payment}', [SchoolFeePaymentController::class, 'update'])->name('update');
    Route::get('print-receipt/{payment}', [SchoolFeePaymentController::class, 'print'])->name('print-receipt');
    Route::get('/{payment}', [SchoolFeePaymentController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::patch('/offence/{student}/debit', [AccountController::class, 'debitForOffence'])->name('debitForOffence');
    Route::patch('/inventory/{student}/debit', [AccountController::class, 'debitForInventory'])->name('debitForInventory');
    Route::patch('/{student}/credit', [AccountController::class, 'credit'])->name('credit');
});

Route::group(['prefix' => 'offences', 'as' => 'offences.'], function () {
    Route::get('/', [OffenceController::class, 'index'])->name('index');
    Route::post('/store', [OffenceController::class, 'store'])->name('store');
    Route::patch('/{offence}/update', [OffenceController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'offence-payments', 'as' => 'offence-payments.'], function () {
    Route::get('/', [OffencePaymentController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
    Route::get('/', [InventoryController::class, 'index'])->name('index');
    Route::post('/store', [InventoryController::class, 'store'])->name('store');
    Route::patch('/{inventory}/update', [InventoryController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'inventory-payments', 'as' => 'inventory-payments.'], function () {
    Route::get('/', [InventoryPaymentController::class, 'index'])->name('index');
    Route::post('/store', [InventoryPaymentController::class, 'store'])->name('store');
});
