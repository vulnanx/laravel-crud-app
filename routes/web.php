<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentHrController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('department-hr', DepartmentHrController::class);
Route::resource('leave-types', LeaveTypeController::class);
Route::resource('leave-requests', LeaveRequestController::class);

