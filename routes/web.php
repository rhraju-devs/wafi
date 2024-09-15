<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::middleware('guest')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('/', [LoginController::class, 'login'])->name('user.login');
        Route::post('login-submit', [LoginController::class, 'loginSubmit'])->name('user.login.submit');
        Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
    });
});










