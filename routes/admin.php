<?php

use App\Http\Controllers\Admin\PostController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin'])->group(function()
{
    Route::redirect('/','admin/posts')->name('admin');
    Route::get('posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
    Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    
    
    Route::post('posts', [PostController::class,'store'])->name('posts.store');
    
    Route::put('posts/{post}/like',[PostController::class,'like'])->name('posts.like');
    Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');
    Route::delete('posts/{post}',[PostController::class, 'delete'])->name('posts.delete');
    
    
});