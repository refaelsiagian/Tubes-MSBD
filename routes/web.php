<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;    
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ClassAdvisorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

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
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    
    Route::prefix('foundation')->middleware('role:foundation')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'foundation'])->name('dashboard.foundation');
    
        Route::resource('/jobs', JobController::class)->except('show');

        Route::resource('/employees', EmployeeController::class)->except('show');

        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    
    });
    
    Route::prefix('admin')->middleware('role:admin')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');

        Route::resource('/subjects', SubjectController::class)->except('show');

        Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
        Route::get('/schedules/{room}', [ScheduleController::class, 'show'])->name('schedules.show');
        Route::get('/schedules/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedules.edit');
        Route::put('/schedules/update/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');

        Route::get('/class-advisors', [ClassAdvisorController::class, 'index'])->name('class-advisors.index');
        Route::put('/class-advisors/update/{room}', [ClassAdvisorController::class, 'update'])->name('class-advisors.update');
    
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });
    
    Route::prefix('principal')->middleware('role:principal')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'principal'])->name('dashboard.principal');
        
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });
    
    Route::prefix('teacher')->middleware('role:teacher')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'teacher'])->name('dashboard.teacher');
        
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });
    
    Route::prefix('inspector')->middleware('role:inspector')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'inspector'])->name('dashboard.inspector');
        
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });
    
    Route::prefix('employee')->middleware('role:employee')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'employee'])->name('dashboard.employee');
        
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');
        
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });

});

