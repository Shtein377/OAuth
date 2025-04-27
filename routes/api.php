<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
return [

    'Текущий язык' => app()->getLocale()
];
});