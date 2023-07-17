<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
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

