<?php

use App\Http\Controllers\ClassroomController;
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

Route::group(['prefix' => 'classrooms', 'as' => 'classrooms.'], function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('index');
    Route::get('/create', [ClassroomController::class, 'create'])->name('create');
    Route::post('/store', [ClassroomController::class, 'store'])->name('store');
    Route::get('/edit/{classroom}', [ClassroomController::class, 'edit'])->name('edit');
    Route::patch('/update/{classroom}', [ClassroomController::class, 'update'])->name('update');
    Route::delete('/delete/{classroom}', [ClassroomController::class, 'destroy'])->name('destroy');
});
