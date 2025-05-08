<?php

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TranslationController;
use Illuminate\Support\Facades\Route;

Route::view('/','admin.home.index')->name('home');

Route::resource('languages', LanguageController::class);
Route::resource('translations',TranslationController::class);
Route::resource('posts',PostController::class);