<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;






// Route::get('/', function () {
//     return view('welcome',['name'=>'Vasia']);
// });

Route::get('test',function(){
$post = Post::query()
->first();

dd($post->title);
});
Route::view('/', 'home.index')->name('home');
Route::view('placeholders', 'placeholders.index')->name('placeholders');
Route::view('pluralization', 'pluralization.index')->name('pluralization');

Route::get('blog', BlogController::class)->name('blog');


Route::get('language/{language}',LanguageController::class )->name('language');