<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\View;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\SettingsController;
// use App\Http\Middleware\Authenticate;
// use App\Http\Middleware\OnlineMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\User\Settings\ProfileController;

Route::redirect('/', '/registration');


Route::middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth','online'])->group(function () {

    Route::redirect('/user', '/user/settings')->name('user');
    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');
    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit');
    Route::post('/user/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update');
});




