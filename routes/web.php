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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\TeachingScheduleController;
use App\Http\Controllers\OtherController;

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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::middleware('role:principal,teacher,inspector,employee,admin')->group(function () {

        Route::get('/presences', [PresenceController::class, 'index'])->name('presences.index');
        Route::post('/presences', [PresenceController::class, 'store'])->name('presences.store');
                
        Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');
        Route::get('/salary/history', [SalaryController::class, 'history'])->name('salary.history');

        Route::middleware('role:teacher,principal,admin')->group(function () {
            Route::get('/teaching-schedules', [TeachingScheduleController::class, 'index'])->name('teaching-schedules.index');
        });
    });
    
    Route::middleware('role:foundation,admin,principal')->group(function () {

        Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
        Route::get('/schedules/{room}', [ScheduleController::class, 'show'])->name('schedules.show');

        Route::get('/class-advisors', [ClassAdvisorController::class, 'index'])->name('class-advisors.index');

        Route::middleware('role:admin')->group(function () {
            
            Route::get('/schedules/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedules.edit');
            Route::put('/schedules/update/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
            
            Route::put('/class-advisors/update/{room}', [ClassAdvisorController::class, 'update'])->name('class-advisors.update');

            Route::resource('/subjects', SubjectController::class)->except('show');
        });

        Route::middleware('role:foundation')->group(function () {
            Route::resource('/jobs', JobController::class)->except('show');

            Route::resource('/employees', EmployeeController::class)->except('show');
            Route::put('/employees/job/{employee}', [EmployeeController::class, 'job'])->name('employees.job');

            Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
            Route::get('/payment/{id}', [PaymentController::class, 'show'])->name('payments.show');
            Route::get('/payment/history/{id}', [PaymentController::class, 'history'])->name('payments.history');
            Route::post('/payment/{id}', [PaymentController::class, 'uploadTransfer'])->name('payments.uploadTransfer');

            Route::get('/others', [OtherController::class, 'index'])->name('others.index');
            Route::put('/others/admin', [OtherController::class, 'admin'])->name('others.admin');
            Route::put('/others/principal', [OtherController::class, 'principal'])->name('others.principal');
            Route::put('/others/fine', [OtherController::class, 'fine'])->name('others.fines');
            Route::put('/others/salary', [OtherController::class, 'salary'])->name('others.salary');
            Route::put('/others/inspector', [OtherController::class, 'inspector'])->name('others.inspector');
        });
    });
});

