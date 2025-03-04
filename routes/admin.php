<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('admin','/admin/dashboard')->name('admin');
Route::get('admin/login' ,[LoginController::class,'index'])->name('admin.login');
Route::post('admin/login' ,[LoginController::class,'store'])->name('admin.login.store');



Route::middleware('auth:admin')->group(function(){
    Route::get('admin/dashboard',DashboardController::class)->name('admin.dashboard');
});