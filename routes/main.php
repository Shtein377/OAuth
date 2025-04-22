<?php

use Illuminate\Support\Facades\Route;






// Route::get('/', function () {
//     return view('welcome',['name'=>'Vasia']);
// });
Route::view('/', 'home.index')->name('home');