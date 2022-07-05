<?php
use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware('auth')->group(function(){
    Route::get('/posts/create',[App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('permission:create-post');

    Route::post('/posts',[App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware('permission:create-post');

    Route::get('/posts',[App\Http\Controllers\PostController::class, 'index'])->name('post.index');

    Route::get('/posts/{post}/edit',[App\Http\Controllers\PostController::class, 'edit'])->name('post.edit')->middleware('permission:update-post');

    Route::delete('/posts/{post}/delete',[App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy')->middleware('permission:delete-post');

    Route::patch('/posts/{post}/update',[App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    
});
