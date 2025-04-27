<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;






// Route::get('/', function () {
//     return view('welcome',['name'=>'Vasia']);
// });
Route::view('/', 'home.index')->name('home');

Route::get('language/{language}',LanguageController::class )->name('language');