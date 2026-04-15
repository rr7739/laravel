<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});
// routes/web.php

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// لكل تخصص صفحة التقديم
Route::get('/apply/{major}', [ApplicationController::class, 'showForm'])->name('apply.major');



Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth', 'admin')->name('admin.dashboard');




// routes/web.php
Route::get('/student/status/{id}', [StudentController::class, 'status'])->name('student.status');




// صفحة التقديم للطلاب حسب التخصص
Route::get('/join', [StudentController::class,'showForm'])->name('student.join');

// فورم الإرسال
Route::post('/join', [StudentController::class,'submitForm'])->name('student.submit');
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/admin/accept/{id}', [AdminController::class,'accept'])->name('admin.accept');
    Route::post('/admin/reject/{id}', [AdminController::class,'reject'])->name('admin.reject');
    Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');
});
Route::get('/student/login', [StudentController::class, 'showLoginForm'])->name('student.login.form');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login');