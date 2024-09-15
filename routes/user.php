<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EmployeeController;


Route::middleware('auth')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::post('profile', [DashboardController::class, 'profilePictureUpdate'])->name('profile.update');
    Route::post('change-password', [DashboardController::class, 'submitPassword'])->name('change.password');
    Route::post('profile-setting', [DashboardController::class, 'submitProfile'])->name('submit.profile');

    Route::get('employee/list', [EmployeeController::class, 'index'])->name('employee.list');
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/{id}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
});








