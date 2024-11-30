<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () { return redirect(route('login')); });
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware('auth')->group(function () {
    
    Route::prefix('foundation')->middleware('role:foundation')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'foundation'])->name('dashboard.foundation');
    
        Route::resource('/jobs', JobController::class)->except('show');
        Route::resource('/employees', EmployeeController::class)->except('show');
    
    });
    
    Route::prefix('admin')->middleware('role:admin')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');

        Route::resource('/subjects', SubjectController::class)->except('show');
    
    });

    Route::prefix('principal')->middleware('role:principal')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'principal'])->name('dashboard.principal');

    });

    Route::prefix('teacher')->middleware('role:teacher')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'teacher'])->name('dashboard.teacher');

    });

    Route::prefix('inspector')->middleware('role:inspector')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'inspector'])->name('dashboard.inspector');

    });

    Route::prefix('employee')->middleware('role:employee')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'employee'])->name('dashboard.employee');

    });

});

