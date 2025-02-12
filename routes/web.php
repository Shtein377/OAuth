<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\View;


Route::redirect('/','/registration');
Route::view('/registration','registration.index')->name('registration');
