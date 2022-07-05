<?php
use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth','can:view,user'])->group(function(){
    Route::get('users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'] )->name('user.profile.show');
    Route::patch('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'] )->name('user.profile.update')->middleware('can:update,user');


    
Route::patch('users/{user}/attach',[App\Http\Controllers\UserController::class, 'attachRole'])->name('user.role.attach');
Route::patch('users/{user}/detach',[App\Http\Controllers\UserController::class, 'detachRole'])->name('user.role.detach');
});