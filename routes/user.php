
<?php

use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('active')->group(function()
{
    Route::redirect('/','user/posts')->name('user');
    Route::get('posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
    Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    
    
    Route::post('posts', [PostController::class,'store'])->name('posts.store');
    
    Route::put('posts/{post}/like',[PostController::class,'like'])->name('posts.like');
    Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');
    Route::delete('posts/{post}',[PostController::class, 'delete'])->name('posts.delete');
    
    Route::resource('posts/{post}/comment',CommentController::class);

});