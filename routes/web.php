<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubjectController;

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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::prefix('foundation')->group(function () {

    Route::resource('/jobs', JobController::class)->except('show');
    Route::resource('/employees', EmployeeController::class)->except('show');

});

Route::prefix('admin')->group(function () {

    Route::resource('/subjects', SubjectController::class)->except('show');

});
