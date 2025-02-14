<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;


Route::redirect('/','/registration');


Route::view('/registration','registration.index')->name('registration');
Route::post('/registration',[RegistrationController::class,'store'])->name('registration.store');

Route::view('/login','login.index')->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');